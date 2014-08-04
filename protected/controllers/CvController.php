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
		
		
		$this->render('index',array(
			'cvData'=>$cvData,
			'cvOpening'=>$cvOpening
		));
		
		
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