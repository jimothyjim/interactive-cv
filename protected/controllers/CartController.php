<?php

class CartController extends Controller
{
	public function actionIndex()
	{
		$criteria=new CDbCriteria(array(
			'order'=>'category DESC',
		));
		
		$criteria->addInCondition('skill_id', Yii::app()->session['cartSkills']);
		
		$dataProvider=new CActiveDataProvider('Skill', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));
		
		$justAdded='';
		if(isset($_GET['justAdded']))
		{
			$justAdded = Skill::model()->findByPk($_GET['justAdded'])->name;
		}
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'justAdded'=>$justAdded
			  
		));
	}
	/**
	 *Adds a skill to the cart by storing a skillid in a session variable array
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
			$tempSessionArray[]=$_GET['skillId'];
			Yii::app()->session['cartSkills']= $tempSessionArray;
		}
		
		echo var_dump(Yii::app()->session['cartSkills']);
		$i=0;
		while ($i<count(Yii::app()->session['cartSkills']))
		{
		echo Yii::app()->session['cartSkills'][$i];
		$i++;
		echo "cow";
		}
		$this->redirect(array('index','justAdded'=>$_GET['skillId']));
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