<?php

/**
 * This is the model class for table "tool_skill". It also refers to items from tool_tags as an attribute
 *
 * The followings are the available columns in table 'tool_skill':
 * @property integer $skill_id
 * @property string $category
 * @property string $name
 * @property string $description
 * @property integer $job_relevance
 * @property integer $cv_prirotiy
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
			array('category, name, description, job_relevance, cv_prirotiy, cv_text, tag', 'required'),
			array('job_relevance, cv_prirotiy', 'numerical', 'integerOnly'=>true),
			array('category, name', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('skill_id, category, name, description, job_relevance, cv_prirotiy, cv_text', 'safe', 'on'=>'search'),
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
			'cv_prirotiy' => 'Cv Prirotiy',
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
		$criteria->compare('cv_prirotiy',$this->cv_prirotiy);
		$criteria->compare('cv_text',$this->cv_text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
