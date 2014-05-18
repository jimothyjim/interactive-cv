<?php
/* @var $this CartController */

$this->breadcrumbs=array(
	'Cart',
);
?>

<?php if($justAdded != ''){ echo '<h2 class="important">You just added ' . CHtml::encode($justAdded) . ' to your cart!</h2>';}?>

<h1>Current Skills in Your Cart </h1>
<h2> The skills listed here will be used to generate a C.V if you click "Generate C.V" at the bottom of the page. </h2>



<?php 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<p>
	
</p>
