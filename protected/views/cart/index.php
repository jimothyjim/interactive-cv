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



<?php 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php echo CHtml::button('Remove everything', array(
	'submit'=> array( '/cart/empty', 'empty'=>'true'),'confirm'=>'This will remove everything from your cart, contine?',
	'class'=>'center')); ?> 
	
<br />

<?php echo CHtml::button('Generate C.V', array(
	'submit'=> array( '/cv/index'),
	'class'=>'center')); ?> 	