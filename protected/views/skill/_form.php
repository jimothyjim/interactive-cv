<?php
/* @var $this SkillController */
/* @var $model Skill */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'skill-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model,'category',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'job_relevance'); ?>
		<?php echo $form->textField($model,'job_relevance'); ?>
		<?php echo $form->error($model,'job_relevance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cv_prirotiy'); ?>
		<?php echo $form->textField($model,'cv_prirotiy'); ?>
		<?php echo $form->error($model,'cv_prirotiy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cv_text'); ?>
		<?php echo $form->textArea($model,'cv_text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cv_text'); ?>
	</div>
	
	<div>
		<?php echo $form->labelEx($model,'tag'); ?>
		<?php echo $form->dropDownList($model, 'tag', CHtml::listData(
		Tag::model()->findAll(), 'tag', 'tag'), array('multiple'=>'multiple', 'size'=>15)
		); ?>
		<?php echo $form->error($model,'tag'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->