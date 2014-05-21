<?php
/* @var $this CartController */

$this->breadcrumbs=array(
	'Cart',
);
?>

<?php if(isset($skillChange['action'])){ echo '<h2 class="important">You just '  . CHtml::encode($skillChange['action']) . ' ' . 
	CHtml::link(CHTML::encode($skillChange['skillName']),array('/skill/view', 'id'=>$skillChange['skillId'])) . '.</h2>';}?>
	
<?php if(isset($skillChange['empty'])){echo '<h2 class ="important"> All skills removed.';} ?>

<h1>Current Skills in Your Cart </h1>
<h2> The skills listed here will be used to generate a C.V if you click "Generate C.V" at the bottom of the page. </h2>
<?php echo CHtml::link('Remove everything',array(
	'/cart/empty', 'empty'=>'true'),array('confirm'=>'This will remove everything from your cart, contine?',
	'class'=>'button')); ?> 
	


<?php echo CHtml::link('Generate C.V', array(
	'/cv/index'), array('class'=>'button')); ?> 


<?php 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php echo CHtml::link('Remove everything',array(
	'/cart/empty', 'empty'=>'true'),array('confirm'=>'This will remove everything from your cart, contine?',
	'class'=>'button')); ?> 
	

<?php echo CHtml::link('Generate C.V', array(
	'/cv/index'), array('class'=>'button')); ?> 	