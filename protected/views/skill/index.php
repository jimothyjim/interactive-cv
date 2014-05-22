<?php
/* @var $this SkillController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle=Yii::app()->name . ' - Skills';
$this->breadcrumbs=array(
	'Skills',
);

$this->menu=array(
	array('label'=>'Create Skill', 'url'=>array('create'), 'visible'=>Yii::app()->user->name=='admin' ),
	array('label'=>'Manage Skill', 'url'=>array('admin'), 'visible'=>Yii::app()->user->name=='admin' ),
	array('label'=>'Education', 'url'=>array('','category'=>'education')),
	array('label'=>'Web Development Skills', 'url'=>array('','category'=>'Web Development Skills')),
	array('label'=>'Software Development', 'url'=>array('','category'=>'Software Development')),
	array('label'=>'General Computing', 'url'=>array('','category'=>'General Computing')),
	array('label'=>'Additional Skills and Interests', 'url'=>array('','category'=>'Additional Skills and Interests')),
	array('label'=>'Work Experience', 'url'=>array('','category'=>'Work Experience')),
);
?>

<h1>Skills</h1>
<?php

$currentCategory = 'none';
$currentTag = 'none';

if(isset($_GET['category']))
{
	$currentCategory =$_GET['category'];
}
if(isset($_GET['tag']))
{
	$currentTag =$_GET['tag'];
}
echo CHtml::link('Add all these skills to the skills cart', array(
	 '/cart/addMany', 'category'=>$currentCategory, 'tag'=>$currentTag), array('confirm'=>'This will add everything here to your cart, contine?',
	'class'=>'button')); ?> 

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
echo CHtml::link('Add all these skills to the skills cart', array(
	 '/cart/addMany', 'category'=>$currentCategory, 'tag'=>$currentTag), array('confirm'=>'This will add everything here to your cart, contine?',
	'class'=>'button')); ?> 
<br />


  