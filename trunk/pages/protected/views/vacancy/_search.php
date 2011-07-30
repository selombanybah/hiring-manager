<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vacancy_code'); ?>
		<?php echo $form->textField($model,'vacancy_code',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emp_type'); ?>
		<?php echo $form->textField($model,'emp_type',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'designation'); ?>
		<?php echo $form->textField($model,'designation',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'department'); ?>
		<?php echo $form->textField($model,'department',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_vacancy'); ?>
		<?php echo $form->textField($model,'no_of_vacancy'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_hiring'); ?>
		<?php echo $form->textField($model,'no_of_hiring'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'edu_qualification'); ?>
		<?php echo $form->textArea($model,'edu_qualification',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'age'); ?>
		<?php echo $form->textField($model,'age',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'age_on'); ?>
		<?php echo $form->textField($model,'age_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'experience'); ?>
		<?php echo $form->textField($model,'experience'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min_salary'); ?>
		<?php echo $form->textField($model,'min_salary'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max_salary'); ?>
		<?php echo $form->textField($model,'max_salary'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'requirements'); ?>
		<?php echo $form->textArea($model,'requirements',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_date'); ?>
		<?php echo $form->textField($model,'last_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'active'); ?>
		<?php echo $form->textField($model,'active',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log'); ?>
		<?php echo $form->textArea($model,'log',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hiring_person'); ?>
		<?php echo $form->textField($model,'hiring_person',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->