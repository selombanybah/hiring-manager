<?php
$this->breadcrumbs=array(
	'Vacancy('.$this->_vacancy->vacancy_code.')'=>array('vacancy/view','id'=>$this->_vacancy->id),
	'Manage applicants',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('applicant-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Applicants</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'applicant-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'vacancy_id',
		'application_date',
		'salutation',
		'name_first',
		'name_middle',
		/*
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
		'alloted_to',
		'prioritize',
		'assigned_to',
		'user_id',
		'created',
		'modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
