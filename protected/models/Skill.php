<?php

/**
 * This is the model class for table "tool_skill". It also refers to items from tool_tags as an attribute
 *
 * The followings are the available columns in table 'tool_skill':
 * @property integer $skill_id
 * @property string $category
 * @property string $name
 * @property string $description
 * @property string $job_relevance
 * @property integer $cv_priority
 * @property string $cv_text
 */
class Skill extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tool_skill';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category, name, description, job_relevance, cv_priority, cv_text, tag', 'required'),
			array(' cv_priority', 'numerical', 'integerOnly'=>true),
			array('job_relevance,category, name', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('skill_id, category, name, description, job_relevance, cv_priority, cv_text', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tag' => array(self::MANY_MANY, 'Tag', 
			'tool_skill_tag(fk_tag_skill_link,fk_skill_tag_link)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'skill_id' => 'Skill',
			'category' => 'Category',
			'name' => 'Name',
			'description' => 'Description',
			'job_relevance' => 'Job Relevance',
			'cv_priority' => 'Cv Priority',
			'cv_text' => 'Cv Text',
			'tag' => 'Tags'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('skill_id',$this->skill_id);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('job_relevance',$this->job_relevance);
		$criteria->compare('cv_priority',$this->cv_priority);
		$criteria->compare('cv_text',$this->cv_text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 *Returns an array of the possible skill categories
	 */
	public static function  getCategories()
	{
		$categoryArray = array(
			'Education'=> 'Education',
			'Web Development Skills' =>' Web Development Skills',
			'Software Development' =>'Software Development' ,
			'General Computing' => 'General Computing',
			'Work Experience'=>'Work Experience',
			'Additional Skills and Interests'=>'Additional Skills and Interests' 
			
			
		);
		return $categoryArray;
	}
	
	/** This is used to find the skill_id of any skills that have been tagged with a specific tag
	* This returned array is generally used as a search criteria to return full skill models 
	* @param integer $tag name of the tag we are trying to filter by
	* @return array of skill_id
	*/
	public static function getSkillIdArrayByTag($tag)
	{
		$skillTag = SkillTag::model()->findAll($condition = 'fk_tag_skill_link = $tag');
		
		$count=0;
		foreach($skillTag as $skill)
		{
			$count++;
			$skillIdIndexArray[$count] = $skill->fk_skill_tag_link;
		}
		
		return $skillIdIndexArray;
	}
	
	/** 
	 *List possible job relevances

	 */
	public static function getJobRelevance()
	{
		$relevances = array('high'=>'high', 'medium'=>'medium', 'low'=>'low');
		return $relevances;
	}
	
	
		
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Skill the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
