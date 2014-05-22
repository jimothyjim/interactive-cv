<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome To My (Simon Freeman) Portfolio Site!</h1>

<p>
	This site was created to supplement my C.V and to showcase some of the things I've done. As this site was created
	as a showcase, some of the features are a bit superflous. I can also assure you I didn't use this to write my actual
	application! Some design choices were made to make sure I could at least generate a web version of the C.V I wrote, and while technically
	functional, other generated C.Vs may be somewhat lacking in the writing departmernt. Please feel free to generate
	a C.V based on 
	<?php echo CHtml::link('my skills,',array('/skill/index'));?>
	 
	or check out
<?php echo CHtml::link('my portfolio,',array('page','view'=>'portfolio')) ?>
or even 
<?php echo CHtml::link('view all the non-sensitive source code','https://github.com/jimothyjim/toolstation', array('target'=>'_blank')); ?>	
 for this site.
</p>
<p>
	Due to the time constraints needed to create this in time for the application deadline, some areas are lacking a little polish.
	Despite this, all the necessary functionality is in place and great care was taken to avoid any bugs. I will continue to improve
	this site for a while after sending in my application, consider this a working beta.
</p>
<p>
	To speed things up, I have made these quick add functions.
</p>
<?php 
	echo CHtml::link('Add actual CV skills to cart', array(
	 '/cart/addPresetCv'), array('confirm'=>'This will clear any current cart items, contine?',
	'class'=>'button')); 
	
	echo CHtml::link('Add all skills to cart', array(
	 '/cart/addAll'), array('confirm'=>'This will clear any current cart items, contine?',
	'class'=>'button')); 
	
?>