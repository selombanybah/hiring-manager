<?php

/**
 * This is the model class for table "{{applicant}}".
 *
 * The followings are the available columns in table '{{applicant}}':
 * @property integer $id
 * @property integer $vacancy_id
 * @property string $application_date
 * @property string $salutation
 * @property string $name_first
 * @property string $name_middle
 * @property string $name_last
 * @property string $sex
 * @property string $d_o_b
 * @property string $nationality
 * @property string $marital_status
 * @property string $edu_qualification
 * @property string $work_experience
 * @property string $languages_known
 * @property string $address
 * @property string $country_name
 * @property string $state_name
 * @property string $city_name
 * @property integer $zip
 * @property string $hobby
 * @property string $contact_no
 * @property string $call_time
 * @property string $email_id
 * @property string $alternate_email_id
 * @property string $resume
 * @property string $image
 * @property string $application_status
 * @property integer $prioritize
 * @property string $assigned_to
 * @property integer $created_by
 * @property integer $modified_by
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property User $modifiedBy
 * @property Vacancy $vacancy
 * @property User $createdBy
 */
class Applicant extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Applicant the static model class
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
		return '{{applicant}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vacancy_id, application_date, name_first, nationality, email_id, application_status, created', 'required'),
			array('vacancy_id, zip, prioritize, created_by, modified_by', 'numerical', 'integerOnly'=>true),
			array('salutation, name_first, name_middle, name_last, languages_known, call_time, image', 'length', 'max'=>100),
			array('sex', 'length', 'max'=>1),
			array('nationality, hobby, contact_no', 'length', 'max'=>20),
			array('marital_status', 'length', 'max'=>2),
			array('work_experience', 'length', 'max'=>255),
			array('address', 'length', 'max'=>255),
			array('country_name, state_name, city_name', 'length', 'max'=>30),
			array('email_id,alternate_email_id', 'length', 'max'=>200),
			array('application_status', 'length', 'max'=>4),
			array('edu_qualification', 'length', 'max'=>255),
            array('application_date,d_o_b', 'type', 'type'=>'date','dateFormat'=>'yyyy-MM-dd'),
			array('modified', 'safe'),
            array('image', 'file', 'types'=>'jpg, gif, png', 'maxSize'=>1024 * 1024 * 10,'allowEmpty'=>true, 
                'tooLarge'=>'The file was larger than 10MB. Please upload a smaller file.',),
            array('resume', 'file', 'types'=>'doc, xls, pdf, txt', 'maxSize'=>1024 * 1024 * 10,'allowEmpty'=>true, 
                'tooLarge'=>'The file was larger than 10MB. Please upload a smaller file.',),
            array('email_id,alternate_email_id', 'email',),
            array('image,resume','unsafe'),  // to avoid overwrite in update
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, vacancy_id, application_date, salutation, name_first, name_middle, name_last, sex, d_o_b, nationality, marital_status, edu_qualification, work_experience, languages_known, address, country_name, state_name, city_name, zip, hobby, contact_no, call_time, email_id, alternate_email_id, resume, image, application_status, prioritize, assigned_to, created_by, modified_by, created, modified', 'safe', 'on'=>'search'),
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
			'modifiedBy' => array(self::BELONGS_TO, 'User', 'modified_by'),
			'vacancy' => array(self::BELONGS_TO, 'Vacancy', 'vacancy_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
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
			'application_date' => 'Application date',
			'salutation' => 'Salutation',
			'name_first' => 'First name',
			'name_middle' => 'Middle name',
			'name_last' => 'Last name',
			'sex' => 'Sex',
			'd_o_b' => 'Date of birth',
			'nationality' => 'Nationality',
			'marital_status' => 'Marital status',
			'edu_qualification' => 'Education qualification',
			'work_experience' => 'Work experience',
			'languages_known' => 'Languages known',
			'address' => 'Address',
			'country_name' => 'Country',
			'state_name' => 'State',
			'city_name' => 'City',
			'zip' => 'Zip',
			'hobby' => 'Hobby',
			'contact_no' => 'Contact no',
			'call_time' => 'Convenient time to call',
			'email_id' => 'Email',
			'alternate_email_id' => 'Alternate email',
			'resume' => 'Resume',
			'image' => 'Image',
			'application_status' => 'Application status',
			'prioritize' => 'Prioritize',
			'assigned_to' => 'Assigned to',
			'created_by' => 'Created by',
			'modified_by' => 'Modified by',
			'created' => 'Created',
			'modified' => 'Modified',
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
		$criteria->compare('vacancy_id',$this->vacancy_id);
		$criteria->compare('application_date',$this->application_date,true);
		$criteria->compare('salutation',$this->salutation,true);
		$criteria->compare('name_first',$this->name_first,true);
		$criteria->compare('name_middle',$this->name_middle,true);
		$criteria->compare('name_last',$this->name_last,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('d_o_b',$this->d_o_b,true);
		$criteria->compare('nationality',$this->nationality,true);
		$criteria->compare('marital_status',$this->marital_status,true);
		$criteria->compare('edu_qualification',$this->edu_qualification,true);
		$criteria->compare('work_experience',$this->work_experience,true);
		$criteria->compare('languages_known',$this->languages_known,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('country_name',$this->country_name,true);
		$criteria->compare('state_name',$this->state_name,true);
		$criteria->compare('city_name',$this->city_name,true);
		$criteria->compare('zip',$this->zip);
		$criteria->compare('hobby',$this->hobby,true);
		$criteria->compare('contact_no',$this->contact_no,true);
		$criteria->compare('call_time',$this->call_time,true);
		$criteria->compare('email_id',$this->email_id,true);
		$criteria->compare('alternate_email_id',$this->alternate_email_id,true);
		$criteria->compare('resume',$this->resume,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('application_status',$this->application_status,true);
		$criteria->compare('prioritize',$this->prioritize);
		$criteria->compare('assigned_to',$this->assigned_to,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
        
        $criteria->condition='vacancy_id=:vacancyID';
        $criteria->params=array(':vacancyID'=>$this->vacancy->id);
		
        return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}