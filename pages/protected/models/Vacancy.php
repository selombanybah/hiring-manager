<?php

/**
 * This is the model class for table "rct_vacancy".
 *
 * The followings are the available columns in table 'rct_vacancy':
 * @property integer $id
 * @property string $vacancy_code
 * @property string $emp_type
 * @property string $designation
 * @property string $department
 * @property integer $no_of_vacancy
 * @property integer $no_of_hiring
 * @property string $edu_qualification
 * @property integer age
 * @property string $age_on
 * @property double $experience
 * @property integer $min_salary
 * @property integer $max_salary
 * @property string $description
 * @property string $requirements
 * @property string $last_date
 * @property string $active
 * @property string $log
 * @property string $hiring_person
 * @property string $created_by
 * @property string $created
 */
class Vacancy extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Vacancy the static model class
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
		return '{{vacancy}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vacancy_code', 'required'),
            array('vacancy_code', 'unique', 'className'=> 'Vacancy'),
			array('no_of_vacancy, no_of_hiring, min_salary, max_salary', 'numerical', 'integerOnly'=>true),
			array('experience', 'numerical'),
			array('vacancy_code', 'length', 'max'=>10),
			array('emp_type, designation', 'length', 'max'=>30),
			array('department', 'length', 'max'=>100),
			array('age', 'length', 'max'=>2),
			array('active', 'length', 'max'=>1),
			array('created_by', 'length', 'max'=>50),
            
			array('edu_qualification, age_on, description, requirements, last_date, log', 'safe'),
            
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, vacancy_code, emp_type, designation, department, no_of_vacancy, no_of_hiring, edu_qualification, age, age_on, experience, min_salary, max_salary, description, requirements, last_date, active, log, hiring_person, created_by, created', 'safe', 'on'=>'search'),
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
            'history' => array(self::HAS_MANY, 'History', 'vacancy_id', 'order'=>'history.created DESC'),
            'historyCount' => array(self::STAT, 'History', 'vacancy_id'),
            'applicants' => array(self::HAS_MANY, 'Applicant', 'vacancy_id', 'order'=>'applicants.modified DESC'),
            'applicantsCount' => array(self::STAT, 'Applicant', 'vacancy_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'vacancy_code' => 'Vacancy code',
			'emp_type' => 'Employee type',
			'designation' => 'Designation',
			'department' => 'Department',
			'no_of_vacancy' => 'No of Vacancy',
			'no_of_hiring' => 'No of Hiring done till now',
			'edu_qualification' => 'Educational Qualification',
			'age' => 'Age',
			'age_on' => 'as on',
			'experience' => 'Experience years',
			'min_salary' => 'Minimum salary',
			'max_salary' => 'Maximum salary',
			'description' => 'Description',
			'requirements' => 'Specific Requirements',
			'last_date' => 'Last date to apply',
			'active' => 'Active',
			'log' => 'Log',
			'hiring_person' => 'Hiring Manager',
			'created_by' => 'Created by',
			'created_date' => 'Created Date',
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
		$criteria->compare('vacancy_code',$this->vacancy_code,true);
		$criteria->compare('emp_type',$this->emp_type,true);
		$criteria->compare('designation',$this->designation,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('no_of_vacancy',$this->no_of_vacancy);
		$criteria->compare('no_of_hiring',$this->no_of_hiring);
		$criteria->compare('edu_qualification',$this->edu_qualification,true);
		$criteria->compare('age',$this->age,true);
		$criteria->compare('age_on',$this->age_on,true);
		$criteria->compare('experience',$this->experience);
		$criteria->compare('min_salary',$this->min_salary);
		$criteria->compare('max_salary',$this->max_salary);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('requirements',$this->requirements,true);
		$criteria->compare('last_date',$this->last_date,true);
		$criteria->compare('active',$this->active,true);
		$criteria->compare('log',$this->log,true);
		$criteria->compare('hiring_person',$this->hiring_person,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
    
    function getActiveOptions()
    {
          return array(
            'both'=>'Both',
            'y'=>'Y',
            'n'=>'N',
          );
    }
    /**
     * @return string the URL that shows the detail of the post
     */
    public function getUrl()
    {
        return Yii::app()->createUrl('vacancy/view', array(
            'id'=>$this->id,
            'title'=>$this->vacancy_code,
        ));
    }
}