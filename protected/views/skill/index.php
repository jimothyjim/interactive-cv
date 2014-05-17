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
	array('label'=>'Web Design', 'url'=>array('','category'=>'web_design')),
	array('label'=>'Software Development', 'url'=>array('','category'=>'software_development')),
	array('label'=>'Computing', 'url'=>array('','category'=>'computing')),
	array('label'=>'Additional Skills and Interests', 'url'=>array('','category'=>'additional_skills_and_interests')),
);
?>

<h1>Skills</h1>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>


  