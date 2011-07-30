<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_date')); ?>:</b>
	<?php echo CHtml::encode($data->application_date); ?>
	<br />

	<b>
	<?php echo CHtml::encode($data->salutation) .' '. CHtml::encode($data->name_first) .' '. CHtml::encode($data->name_middle) .' '. CHtml::encode($data->name_last)?>
    </b>
	<br />
    
    <?php if($data->image) : ?>
    <?php echo CHtml::image( Yii::app()->baseUrl.'/'.Yii::app()->params['applicantFiles'].'/'.$data->id.'/'. $data->image,'image',array('width'=>50,'height'=>50)); ?>
    <br />
    <?php endif; ?>
    
    <?php if($data->resume) : ?>
    <?php echo CHtml::link('resume', Yii::app()->baseUrl.'/'.Yii::app()->params['applicantFiles'].'/'.$data->id.'/'. $data->resume,array('target'=>'_blank')); ?>
    <br />
    <?php endif; ?>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php echo CHtml::encode($data->sex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('d_o_b')); ?>:</b>
	<?php echo CHtml::encode($data->d_o_b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nationality')); ?>:</b>
	<?php echo CHtml::encode($data->nationality); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marital_status')); ?>:</b>
	<?php echo CHtml::encode($data->marital_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edu_qualification')); ?>:</b>
	<?php echo CHtml::encode($data->edu_qualification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_experience')); ?>:</b>
	<?php echo CHtml::encode($data->work_experience); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('languages_known')); ?>:</b>
	<?php echo CHtml::encode($data->languages_known); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_name')); ?>:</b>
	<?php echo CHtml::encode($data->country_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state_name')); ?>:</b>
	<?php echo CHtml::encode($data->state_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_name')); ?>:</b>
	<?php echo CHtml::encode($data->city_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip')); ?>:</b>
	<?php echo CHtml::encode($data->zip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hobby')); ?>:</b>
	<?php echo CHtml::encode($data->hobby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_no')); ?>:</b>
	<?php echo CHtml::encode($data->contact_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('call_time')); ?>:</b>
	<?php echo CHtml::encode($data->call_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_id')); ?>:</b>
	<?php echo CHtml::encode($data->email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alternate_email_id')); ?>:</b>
	<?php echo CHtml::encode($data->alternate_email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resume')); ?>:</b>
	<?php echo CHtml::encode($data->resume); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_status')); ?>:</b>
	<?php echo CHtml::encode($data->application_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alloted_to')); ?>:</b>
	<?php echo CHtml::encode($data->alloted_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prioritize')); ?>:</b>
	<?php echo CHtml::encode($data->prioritize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assigned_to')); ?>:</b>
	<?php echo CHtml::encode($data->assigned_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	*/ ?>

</div>