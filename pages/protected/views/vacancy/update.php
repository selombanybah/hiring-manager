<?php
$this->breadcrumbs=array(
	'Vacancys'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vacancy', 'url'=>array('index')),
	array('label'=>'Create Vacancy', 'url'=>array('create')),
	array('label'=>'View Vacancy', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Vacancy', 'url'=>array('admin')),
);
?>

<h1>Update Vacancy <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>