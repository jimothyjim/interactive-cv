<?php
/* @var $this SkillController */
/* @var $model Skill */

$this->breadcrumbs=array(
	'Skills'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Skill', 'url'=>array('index')),
	array('label'=>'Create Skill', 'url'=>array('create')),
	array('label'=>'Update Skill', 'url'=>array('update', 'id'=>$model->skill_id)),
	array('label'=>'Delete Skill', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->skill_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Skill', 'url'=>array('admin')),
);
?>

<h1>View Skill #<?php echo $model->name; ?></h1>
<?php 
// Make my tag array array make a string as I'm not sure how to implode it
$tag = $model->tag;

$tagAmount = sizeOf($model->tag);
$count = 0;
$tagString = '';
while($count < $tagAmount)
{
	$tagString = $tagString  . $tag[$count]->tag . ", ";
	$count++;
}
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'category',
		'name',
		'description',
		'job_relevance',
		'cv_priority',
		'cv_text',
		array(
		'name' => 'Tags',
		'type'=>'text',
		'value' => $tagString
		
		)
	),
));

 ?>
