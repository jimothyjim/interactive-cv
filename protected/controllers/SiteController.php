<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	
	/**
	* Deals with people entering the site using their personalised CV link. This is for when a CV has been sent off
	* with a shorterned url and the site needs to build a custom CV to match the one they've been sent.The url will contain a list of 
	* the skill ids in the "skills" get parameter and optionally the name of the company in the "company" get parameter
	*/
	
	public function actionIncoming()
	{
		//if skills are supplied then it explodes the string to an array and saves it as a session variable called cartSkillsRealCv
		// Additionally it also fills the current cart with those skills.
		if(isset($_GET['skills']))
		{
			Yii::app()->session['cartSkills']= array();
			Yii::app()->session['cartSkillsRealCv']= array();
			
			
			
			$skillIdArray = explode("-", $_GET['skills']);
			

			Yii::app()->session['cartSkills']=$skillIdArray;
			Yii::app()->session['cartSkillsRealCv']=$skillIdArray;

		}
		
		//Sets company session variables. This is used 
		//for extra bits of customisation. Two variables are used, one for easier coding using - still,
		//and one that has - symbols replaced with symbols for text friendly outputs.
		if(isset($_GET['company']))
		{
			Yii::app()->session['company']= $_GET['company'];
			$companyText = str_replace('-', ' ', $_GET['company']);
			Yii::app()->session['companyText']= $companyText;
		}
		
		$this->redirect(array('index'));
	}
		

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	

	 
	  
}