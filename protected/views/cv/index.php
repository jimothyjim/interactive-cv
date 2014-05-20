<?php
/* @var $this CvController */

$this->breadcrumbs=array(
	'Cv',
);
?>
<h1> Simon Freeman <h1>
<?php 
$education='';
$software='';
$web='';
$computing='';
$work='';
$interests='';
foreach($cvData as $skill)
{
	//echo $skill->category . '<br />';
	switch($skill->category){
		case'education':
			
			$education .= $skill-> cv_text . ' ';
			break;
		case'software_development':
			
			$software .= $skill->cv_text . ' ';
			break;
		case'web_design':
			
			$web .= $skill->cv_text . ' ';
			break;
		case'general_computing':
			
			$computing .= $skill->cv_text . ' ';
			break;
		case'relevant_experience':
			
			$work .= $skill->cv_text . ' ';
			break;
		case'additional_skills_and_interests':
			
			$interests .= $skill->cv_text . ' ';
			break;
	}
}


if($education!='')
{
	echo "<h2>Education</h2>";
	echo $education;
}

if($software !='')
{
	echo "<h2>Software Development Skills </h2>";
	echo $software;
}

if($web!='')
{
	echo "<h2>Web Development Skills </h2>";
	echo $web;
}

if($computing!='')
{
	echo "<h2>General Computing Skills</h2>";
	echo $computing;
}

if($work!='')
{
	echo "<h2>Relevant Work Experience</h2>";
	echo $work;
}

if($interests!='')
{
	echo "<h2>Additional Skills and Interests</h2>";
	echo $interests;
}
