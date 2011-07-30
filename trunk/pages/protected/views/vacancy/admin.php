<?php
$this->breadcrumbs=array(
	'Vacancys'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Vacancy', 'url'=>array('index')),
	array('label'=>'Create Vacancy', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('vacancy-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Vacancys</h1>

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
	'id'=>'vacancy-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'vacancy_code',
		'emp_type',
		'designation',
		'department',
		'no_of_vacancy',
		/*
		'no_of_hiring',
		'edu_qualification',
		'age',
		'age_on',
		'experience',
		'min_salary',
		'max_salary',
		'description',
		'requirements',
		'last_date',
		'active',
		'log',
		'hiring_person',
		'created_by',
		'created',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
