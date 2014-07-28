<?php
$this->pageTitle=Yii::app()->name . ' - Portfolio';
$this->breadcrumbs=array(
	'Portfolio',
);
?>
<h1>Portfolio</h1>

<div class="portfolioSegment"> 
	<h2> This Website </h2>
	<p> 
		This website was coded by myself using the Yii framework. All the code for this is available 
		<?php echo CHtml::link('here','https://github.com/jimothyjim/toolstation', array('target'=>'_blank')); ?>
		All code was created by myself or from the Yii code generation tools. 
	</p>
</div>
<div class="portfolioSegment"> 
	<h2> Website Created for Local Water Company</h2>
	<p> 
		This website was created completely from scratch. The goal was to create a clean and simple website that 
		could be used for advertising and for customer feedback. A few areas with Lorem Ipsum remain where the 
		relevant information was not provided to me. 
		<?php echo CHtml::link('It can be viewed here','http://spfreeman.net/stenlakes', array('target'=>'_blank')); ?>. </p>
</div>
<div class="portfolioSegment"> 
	<h2>University Dissertation</h2>
	<p> 
		This Dissertation was my final project for university. It included a research, design, implementation, and review section.
		The goal was to create a website where gamers could schedule events.
		<?php echo CHtml::link('Viewable in PDF form here',yii::app()->getBaseUrl() .'/downloads/project.pdf',
		array('target'=>'_blank'));?>. pologies for some layout issues, I don't currently have access to Microsoft Office. Contents page is accurate.</p>
</div>