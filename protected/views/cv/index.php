<?php
/* @var $this CvController */

$this->breadcrumbs=array(
	'Cv',
);
?>
<div id ="cv">
<h1> Simon Freeman </h1>
<p> Contact Details Redacted for Online C.V </p>	
<p>
	<?php echo $cvOpening[0]->opening_text; ?>
</p>
<?php 
$education='';
$software='';
$web='';
$computing='';
$work='';
$interests='';
$education1 = '';
foreach($cvData as $skill)
{
	//echo $skill->category . '<br />';
	switch($skill->category){
		case'Education':
			if($skill->cv_priority == 1)
			{
				$education1 .= $skill->cv_text;
			}
			else
			{
				$education .= '<li>' . $skill->cv_text . '</li> ';
			}
			break;
		case'Software Development':
			
			$software .=  '<p>' . $skill->cv_text . '</p> ';
			break;
		case'Web Development Skills':
			
			$web .= '<p>' . $skill->cv_text . '</p>';
			break;
		case'General Computing':
			
			$computing .= '<p>' . $skill->cv_text . '</p> ';
			break;
		case'Work Experience':
			
			$work .= $skill->cv_text . ' ';
			break;
		case'Additional Skills and Interests':
			
			$interests .=   $skill->cv_text ;
			break;
	}
}

//All u
if($education!='')
{
	echo '<h2>Education</h2>
		<h3>2008 - 2011   University of Glamorgan</h3>
		<h4>2:1 BSc Internet Computing</h4>
		<ul>';
	echo $education;
	echo '</ul>';
	if($education1!='')
	{
		echo '<h3>2001-2008    Launceston College</h3>';
		echo $education1;
	}
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

?>
</div>