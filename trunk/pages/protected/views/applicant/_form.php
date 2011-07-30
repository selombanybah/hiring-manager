<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'applicant-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'vacancy_id'); ?>
		<?php $form->hiddenField($this->_vacancy,'id') ?>
		<?php echo $form->error($model,'vacancy_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($this->_vacancy,'vacancy_code'); ?>
		<?php echo $this->_vacancy->vacancy_code ?>
		<?php //echo $form->error($model,'vacancy_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'application_date'); ?>
		<?php //echo $form->textField($model,'application_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model'=>$model,
			'attribute'=>'application_date',
            // additional javascript options for the date picker plugin
            'options'=>array(
                'showAnim'=>'fold',
				'dateFormat'=>'yy-mm-dd',
            ),
            'htmlOptions'=>array(
                'style'=>'height:20px;',
				'value'=>date('Y-m-d'),
            ),
        )); ?>
		<?php echo $form->error($model,'application_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salutation'); ?>
		<?php echo $form->dropDownList($model, 'salutation',Yii::app()->params['salutation']); ?>
		<?php echo $form->error($model,'salutation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_first'); ?>
		<?php echo $form->textField($model,'name_first',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name_first'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_middle'); ?>
		<?php echo $form->textField($model,'name_middle',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name_middle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_last'); ?>
		<?php echo $form->textField($model,'name_last',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name_last'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
        <?php echo $form->radioButtonList($model, 'sex',Yii::app()->params['sex'],array('separator'=>'')); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d_o_b'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model'=>$model,
            'attribute'=>'d_o_b',
            // additional javascript options for the date picker plugin
            'options'=>array(
                'showAnim'=>'fold',
                'dateFormat'=>'yy-mm-dd',
            ),
            'htmlOptions'=>array(
                'style'=>'height:20px;',
                //'value'=>date('m/d/y'),
            ),
        )); ?>
		<?php echo $form->error($model,'d_o_b'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nationality'); ?>
		<?php echo $form->textField($model,'nationality',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nationality'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marital_status'); ?>
        <?php echo $form->radioButtonList($model, 'marital_status',Yii::app()->params['marital_status'],array('separator'=>'')); ?>	
		<?php echo $form->error($model,'marital_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'edu_qualification'); ?>
		<?php echo $form->textArea($model,'edu_qualification',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'edu_qualification'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_experience'); ?>
		<?php echo $form->textArea($model,'work_experience',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'work_experience'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'languages_known'); ?>
		<?php echo $form->textField($model,'languages_known',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'languages_known'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>
    <div class="row">
        <?php echo $form->labelEx($model,'city_name'); ?>
        <?php echo $form->textField($model,'city_name',array('size'=>30,'maxlength'=>30)); ?>
        <?php echo $form->error($model,'city_name'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'state_name'); ?>
        <?php echo $form->textField($model,'state_name',array('size'=>30,'maxlength'=>30)); ?>
        <?php echo $form->error($model,'state_name'); ?>
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'country_name'); ?>
		<?php echo $form->textField($model,'country_name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'country_name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip'); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hobby'); ?>
		<?php echo $form->textField($model,'hobby',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'hobby'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_no'); ?>
		<?php echo $form->textField($model,'contact_no',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'contact_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'call_time'); ?>
		<?php echo $form->textField($model,'call_time',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'call_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_id'); ?>
		<?php echo $form->textField($model,'email_id',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alternate_email_id'); ?>
		<?php echo $form->textField($model,'alternate_email_id',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'alternate_email_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resume'); ?>
		<?php echo $form->fileField($model,'resume',array('size'=>20)); ?>
		<?php echo $form->error($model,'resume'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image',array('size'=>20)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'assigned_to'); ?>
		<?php echo $form->textField($model,'assigned_to',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'assigned_to'); ?>
	</div>




	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->