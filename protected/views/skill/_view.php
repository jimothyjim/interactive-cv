<?php
/* @var $this SkillController */
/* @var $data Skill */
?>

<div class="view">



	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name),array('view', 'id'=>$data->skill_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job_relevance')); ?>:</b>
	<?php echo CHtml::encode($data->job_relevance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cv_text')); ?>:</b>
	<?php echo CHtml::encode($data->cv_text); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('tag')); ?>:</b>
	<?php foreach($data->tag as $tag){ echo CHtml::Link(CHtml::encode($tag->tag), array('','tag'=>$tag->tag)); echo ', ';}  ?>
	<br />

	<b><?php echo CHtml::button('Add "' . CHtml::encode($data->name) . '" to Skills Cart', array(
		'submit'=> array( '/cart/add', 'skillId'=>$data->skill_id)
	));
	


  
	  ?></b>
	<br />
	


</div>