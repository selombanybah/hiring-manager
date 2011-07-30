<?php
$this->breadcrumbs=array(
	'Vacancy'=>array('index'),
	$model->vacancy_code,
);

$this->menu=array(

	array('label'=>'Update Vacancy', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Vacancy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),

);

$this->amenu = array(
    array('label'=>'List Applicant', 'url'=>array('applicant/index','vid'=>$model->id)),
    array('label'=>'Add Applicant', 'url'=>array('applicant/create', 'vid'=>$model->id)),
    array('label'=>'Manage Applicant', 'url'=>array('applicant/admin', 'vid'=>$model->id)),
);
?>

<h1>View Vacancy <?php echo $model->vacancy_code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'vacancy_code',
		'emp_type',
		'designation',
		'department',
		'no_of_vacancy',
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
		'hiring_person',
		array('value'=>$model->createdBy->username,'label'=>'Created by'),
        array('value'=>$model->modifiedBy->username, 'label'=>'Modified by'),
		'created',
        'modified',
	),
)); ?>
<!-- history -->
<div id="comments">
    <?php if($model->historyCount>=1): ?>
        <h3>
            History
        </h3>

        <?php $this->renderPartial('_history',array(
            
            'history'=>$model->history,
        )); ?>
    <?php endif; ?>

    <h3>Leave a Note</h3>
    <?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
        </div>
    <?php else: ?>
        <?php $this->renderPartial('/history/_form',array(
            'model'=>$comment,
        )); ?>
    <?php endif; ?>

</div><!-- history -->

