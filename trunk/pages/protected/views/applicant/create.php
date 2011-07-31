<?php
$this->breadcrumbs=array(
	'Vacancy('.$this->_vacancy->vacancy_code.')'=>array('vacancy/view','id'=>$this->_vacancy->id),
	'Add applicant',
);


?>

<h1>Add Applicant</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>