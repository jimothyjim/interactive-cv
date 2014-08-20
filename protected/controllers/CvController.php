<?php

class CvController extends Controller
{
	public function actionIndex()
	{
		//Gets all the cv skills in the skills cart from the database
		$criteria=new CDbCriteria(array(
			'order'=>'category DESC, cv_priority ASC',
		));
		
		$criteria->addInCondition('skill_id', Yii::app()->session['cartSkills']);
		$cvData = Skill::model()->findAll($criteria);
		
		//if it's a cv for a specific company then the 'company' session variable should be set
		// and a custom cv opening should be pulled from the database.
		if(isset(Yii::app()->session['company']))
		{
			$criteria=new CDbCriteria(array());
			//it wants an array so an array it gets an array
			$arrayWrapper = array();
			$arrayWrapper[0]=Yii::app()->session['company'];
			$criteria->addInCondition('company', $arrayWrapper);
			$cvOpening = Opening::model()->findAll($criteria);
		}
		else
		{
			$criteria=new CDbCriteria(array());
			//it wants an array so an array it gets an array
			$arrayWrapper = array();
			$arrayWrapper[0]="default";
			$criteria->addInCondition('company', $arrayWrapper);
			$cvOpening = Opening::model()->findAll($criteria);
		}
		
		//sends a link url to the view if the linkCreate action button is pushed
		$cvLink;
		if (isset($_GET['link']))
		{
			$cvLink = $_GET['link'];
		}
		
		$this->render('index',array(
			'cvData'=>$cvData,
			'cvOpening'=>$cvOpening,
			'cvLink'=>$cvLink
		));
		
		
	}
	
	public function actionLinkCreate()
	{
		//hardcoded start of the address
		$urlStart = "http://www.spfreeman.net/index.php/site/incoming?";
		//builds the skills part of the url
		$urlSkills = "skills=" . implode("-", Yii::app()->session['cartSkills']);
		//adds the company to the url
		if(isset(Yii::app()->session['company']))
		{
			$urlCompany = "&company=" . Yii::app()->session['company'];
		}
		else
		{
			$urlCompany = "&company=" . "default";
		}
		
		$url = $urlStart . $urlSkills . $urlCompany;
		
		$this->redirect(array('index','link'=>$url));
		
	
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