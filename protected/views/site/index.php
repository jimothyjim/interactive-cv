<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>
	<?php if(isset(Yii::app()->session['companyText']))
		{
			echo Yii::app()->session['companyText'] . ', ';
		}
	?>
	Welcome To My (Simon Freeman) Portfolio Site!
</h1>

<p>
	This site was created to supplement my CV and to showcase some of the things I've done. The skills cart automatically contains my correct CV skills to get you started. As this site was created
	as a showcase, some of the features are a bit superflous. Some design choices were made to ensure I could recreate CVs I have personally written. Feel free to browse
	<?php echo CHtml::link('my skills,',array('/skill/index'));?>
	 
	and use them to generate a different CV, or check out 
<?php echo CHtml::link('my portfolio,',array('page','view'=>'portfolio')) ?>
 or even 
<?php echo CHtml::link('view all the non-sensitive source code','https://github.com/jimothyjim/toolstation', array('target'=>'_blank')); ?>	
 for this site. If you modified the CV, the "Add actual CV skills to cart" button will always reset the cart to hold the skills that create the CV tailored to you.
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