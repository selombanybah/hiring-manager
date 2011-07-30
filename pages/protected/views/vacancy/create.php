<?php
$this->breadcrumbs=array(
	'Vacancys'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Vacancy', 'url'=>array('index')),
	array('label'=>'Manage Vacancy', 'url'=>array('admin')),
);
?>

<h1>Create Vacancy</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>