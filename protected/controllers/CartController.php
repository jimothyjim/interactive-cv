<?php

class CartController extends Controller
{
	/**
	 *Shows all the skills in the cart.
	 *If something has been just added, or just removed then it passes the $skillChange array
	 *to the the index so the user has confirmation that skill blah has been removed/added.
	 *Also tells the user they emptied their cart
	 */
	public function actionIndex()
	{
		$criteria=new CDbCriteria(array(
			'order'=>'category DESC',
		));
		
		$criteria->addInCondition('skill_id', Yii::app()->session['cartSkills']);
		
		$dataProvider=new CActiveDataProvider('Skill', array(
			'pagination'=>array(
				'pageSize'=>'5',
			),
			'criteria'=>$criteria,
		));
		
		//Declare it as empty to avoid an error if it's not passing any real data
		$skillChange = [];
		
		//Creates data for index about the skill that was just added
		//if it was miltiple skills, it jsut says added multiple for the moment
		if(isset($_GET['justAdded']))
		{
			if($_GET['justAdded']=='multiple')
			{
				$skillChange['skillName'] = 'multiple things';
				$skillChange['skillId']='#';
			}
			else
			{
				$skillChange['action'] = 'added';
				$skillAddedModel =  Skill::model()->findByPk($_GET['justAdded']);
				$skillChange['skillName'] =$skillAddedModel->name;
				$skillChange['skillId']= $skillAddedModel->skill_id;
			}
		}

		//Creates data for index about the skill that was just removed
		if(isset($_GET['justRemoved']))
			
		{
			$skillChange['action'] = 'removed';
			$skillRemovedModel =  Skill::model()->findByPk($_GET['justRemoved']);
			$skillChange['skillName'] = $skillRemovedModel->name;
			$skillChange['skillId'] = $skillRemovedModel->skill_id;
		}
		
		//Notifies the index everything just got emptied
		if(isset($_GET['empty']))
		{	
			if($_GET['empty'] == 'true')
			{
				$skillChange['empty'] = 'emptied';
			}
		}
		
		//Actually calls the render of the page
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'skillChange'=>$skillChange
			  
		));

	}
	
	/**
	 *Adds a skill to the cart by storing a skillid in a session variable array.
	 *This function prevents repeat skill_id entries
	 */
	public function actionAdd()
	{

		//Yii can't handle adding to an array with it's session thing
		//so instead copy it to a tempSessionArray, add a new array item and 
		//then overwrite that session variable with the modified tempSessionArray
		//Also need to initiallize the session variable if it doesn't already exist
		if(isset($_GET['skillId']))
		{
			if(!isset(Yii::app()->session['cartSkills']))
			{
				Yii::app()->session['cartSkills']= array();
			}
			$tempSessionArray = Yii::app()->session['cartSkills'];
			//check to see if the item is already in the cart before adding it to the array
			if(array_search($_GET['skillId'], $tempSessionArray)===false)
			{
				$tempSessionArray[]=$_GET['skillId'];
			}
			Yii::app()->session['cartSkills']= $tempSessionArray;


		}
		
	
		$this->redirect(array('index','justAdded'=>$_GET['skillId']));
	}
	
	/** 
	 *Deals with adding multiple skills at once, filters by category and tags

	 */
	 
	public function actionAddMany()
	{
		$criteria=new CDbCriteria(array(
		));
		if($_GET['category']!='none')
		{
			$category = $_GET['category'];
			$criteria->addCondition('category="' . $category .'"');

		}
		
		if($_GET['tag']!='none')
		{
			$skillIdIndexArray =Skill::model()->getSkillIdArrayByTag($_GET['tag']);
			$criteria->addInCondition('skill_id', $skillIdIndexArray);

		}
		
		$skills = Skill::model()->findAll($criteria);
		
		//Yii can't handle adding to an array with it's session thing
		//so instead copy it to a tempSessionArray, add a new array item and 
		//then overwrite that session variable with the modified tempSessionArray
		//Also need to initiallize the session variable if it doesn't already exist

		if(!isset(Yii::app()->session['cartSkills']))
		{
			Yii::app()->session['cartSkills']= array();
		}
		
		foreach($skills as $skill)
		{
			$tempSessionArray = Yii::app()->session['cartSkills'];
			//check to see if the item is already in the cart before adding it to the array
			if(array_search($skill->skill_id, $tempSessionArray)===false)
			{
				$tempSessionArray[]=$skill->skill_id;
			}
			Yii::app()->session['cartSkills']= $tempSessionArray;
		}
		
		$this->redirect(array('index','justAdded'=>'multiple'));
	}
	/**
	 *Removes a skill from the cart by removing its skill_id from the session
	 */
	public function actionRemove()
	{

		//Yii can't handle array manipulation with it's session thing
		//so instead copy it to a tempSessionArray, remove the item and 
		//then overwrite that session variable with the modified tempSessionArray.
		//Also, we need to make sure the array indexes don't break so
		if(isset($_GET['remove']))
		{
			$tempSessionArray = Yii::app()->session['cartSkills'];
			$arrayPositionSession = array_search($_GET['remove'],$tempSessionArray);

			if($arrayPositionSession!==false)
			{
				array_splice($tempSessionArray, $arrayPositionSession,1);
			}
			Yii::app()->session['cartSkills']= $tempSessionArray;
		}
		
		$this->redirect(array('index','justRemoved'=>$_GET['remove']));
	}
	
	/**
	* Removes all skills from the cart by resetting the session variable
	*/
	public function actionEmpty()
	{
		Yii::app()->session['cartSkills']= array();
		$this->redirect(array('index','empty'=>'true'));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}