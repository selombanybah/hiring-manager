<?php
$this->breadcrumbs=array(
	'Vacancy('.$this->_vacancy->vacancy_code.')'=>array('vacancy/view','id'=>$this->_vacancy->id),
	'Add applicant',
);

$this->menu=array(
	array('label'=>'List Applicant', 'url'=>array('index','vid'=>$this->_vacancy->id)),
	array('label'=>'Manage Applicant', 'url'=>array('admin','vid'=>$this->_vacancy->id)),
);
?>

<h1>Add Applicant</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>