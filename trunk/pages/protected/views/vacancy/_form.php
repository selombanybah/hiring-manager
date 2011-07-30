<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vacancy-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'vacancy_code'); ?>
		<?php echo $form->textField($model,'vacancy_code',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'vacancy_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emp_type'); ?>
		<?php echo $form->textField($model,'emp_type',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'emp_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'designation'); ?>
		<?php echo $form->textField($model,'designation',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'designation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department'); ?>
		<?php echo $form->textField($model,'department',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'department'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_of_vacancy'); ?>
		<?php echo $form->textField($model,'no_of_vacancy'); ?>
		<?php echo $form->error($model,'no_of_vacancy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_of_hiring'); ?>
		<?php echo $form->textField($model,'no_of_hiring'); ?>
		<?php echo $form->error($model,'no_of_hiring'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'edu_qualification'); ?>
		<?php echo $form->textArea($model,'edu_qualification',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'edu_qualification'); ?>
	</div>

	<div class="row">
        <label for="Vacancy_age">Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; as on</label>
		<?php// echo $form->labelEx($model,'age'); ?> <?php //echo $form->labelEx($model,'age_on'); ?>
		<?php echo $form->textField($model,'age',array('size'=>3,'maxlength'=>3)); ?>        
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model'=>$model,
    'attribute'=>'age_on',
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>'yy-mm-dd',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
)); ?>
		<?php echo $form->error($model,'age'); ?><?php echo $form->error($model,'age_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'experience'); ?>
		<?php echo $form->textField($model,'experience'); ?>
		<?php echo $form->error($model,'experience'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_salary'); ?>
		<?php echo $form->textField($model,'min_salary'); ?>
		<?php echo $form->error($model,'min_salary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_salary'); ?>
		<?php echo $form->textField($model,'max_salary'); ?>
		<?php echo $form->error($model,'max_salary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'requirements'); ?>
		<?php echo $form->textArea($model,'requirements',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'requirements'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_date'); ?>
 <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model'=>$model,
    'attribute'=>'last_date',
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>'yy-mm-dd',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
)); ?>
		<?php echo $form->error($model,'last_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo  $form->dropDownList($model,'active', $model->getActiveOptions()); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hiring_person'); ?>
		<?php echo $form->textField($model,'hiring_person',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'hiring_person'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->