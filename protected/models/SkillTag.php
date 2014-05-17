<?php

/**
 * This is the model class for table "tool_skill_tag".
 *
 * The followings are the available columns in table 'tool_skill_tag':
 * @property integer $fk_skill_tag_link
 * @property string $fk_tag_skill_link
 *
 * The followings are the available model relations:
 * @property Tag $fkTagSkillLink
 * @property Skill $fkSkillTagLink
 */
class SkillTag extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tool_skill_tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_skill_tag_link, fk_tag_skill_link', 'required'),
			array('fk_skill_tag_link', 'numerical', 'integerOnly'=>true),
			array('fk_tag_skill_link', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('fk_skill_tag_link, fk_tag_skill_link', 'safe', 'on'=>'search'),
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
			'fkTagSkillLink' => array(self::BELONGS_TO, 'Tag', 'fk_tag_skill_link'),
			'fkSkillTagLink' => array(self::BELONGS_TO, 'Skill', 'fk_skill_tag_link'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fk_skill_tag_link' => 'Fk Skill Tag Link',
			'fk_tag_skill_link' => 'Fk Tag Skill Link',
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

		$criteria->compare('fk_skill_tag_link',$this->fk_skill_tag_link, true);
		$criteria->compare('fk_tag_skill_link',$this->fk_tag_skill_link,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SkillTag the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
