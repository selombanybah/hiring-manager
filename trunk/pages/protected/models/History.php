<?php

/**
 * This is the model class for table "{{history}}".
 *
 * The followings are the available columns in table '{{history}}':
 * @property integer $id
 * @property string $vacancy_id
 * @property string $applicant_id
 * @property integer $interview_id
 * @property string $status
 * @property string $action
 * @property string $modified
 * @property string $created_by
 * @property string $created
 */
class History extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return History the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{history}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('modified, created_by, created', 'required'),
			array('interview_id', 'numerical', 'integerOnly'=>true),
			array('vacancy_id', 'length', 'max'=>10),
			array('applicant_id', 'length', 'max'=>15),
			array('status', 'length', 'max'=>4),
			array('action', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, vacancy_id, applicant_id, interview_id, status, action, modified, created_by, created', 'safe', 'on'=>'search'),
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
            'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'modifiedBy' => array(self::BELONGS_TO, 'User', 'modified_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'vacancy_id' => 'Vacancy',
			'applicant_id' => 'Applicant',
			'interview_id' => 'Interview',
			'status' => 'Status',
			'action' => 'Action',
			'modified' => 'Modified',
			'created_by' => 'User',
			'created' => 'Created',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('vacancy_id',$this->vacancy_id,true);
		$criteria->compare('applicant_id',$this->applicant_id,true);
		$criteria->compare('interview_id',$this->interview_id);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}