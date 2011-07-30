<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'history-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'vacancy_id'); ?>
		<?php echo $form->textField($model,'vacancy_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'vacancy_id'); ?>
	</div>-->

	<!--<div class="row">
		<?php echo $form->labelEx($model,'applicant_id'); ?>
		<?php echo $form->textField($model,'applicant_id',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'applicant_id'); ?>
	</div>-->

	<!--<div class="row">
		<?php echo $form->labelEx($model,'interview_id'); ?>
		<?php echo $form->textField($model,'interview_id'); ?>
		<?php echo $form->error($model,'interview_id'); ?>
	</div>-->

	<!--<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>-->

	<div class="row">
		<!--<?php echo $form->labelEx($model,'action'); ?>-->
		<?php echo $form->textArea($model,'action',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'action'); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>-->

	<!--<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>-->

	<!--<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->