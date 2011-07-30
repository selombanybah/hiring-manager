<?php
$this->breadcrumbs=array(
    'Vacancy('.$this->_vacancy->vacancy_code.')'=>array('vacancy/view','id'=>$this->_vacancy->id),
	'Applicants'=>array('index','vid'=>$this->_vacancy->id),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Applicant', 'url'=>array('index')),
	array('label'=>'Create Applicant', 'url'=>array('create')),
	array('label'=>'Update Applicant', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Applicant', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Applicant', 'url'=>array('admin')),
);
?>

<h1>View Applicant #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'vacancy_id',
		'application_date',
		'salutation',
		'name_first',
		'name_middle',
		'name_last',
		'sex',
		'd_o_b',
		'nationality',
		'marital_status',
		'edu_qualification',
		'work_experience',
		'languages_known',
		'address',
		'country_name',
		'state_name',
		'city_name',
		'zip',
		'hobby',
		'contact_no',
		'call_time',
		'email_id',
		'alternate_email_id',
		'resume',
		'image',
		'application_status',
		'prioritize',
		'assigned_to',
		'created_by',
        'modified_by',
		'created',
		'modified',
	),
)); ?>
