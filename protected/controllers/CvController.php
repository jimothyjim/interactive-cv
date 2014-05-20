<?php

class CvController extends Controller
{
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
		
		var_dump($dataProvider);
		$this->render('index');
		
		
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