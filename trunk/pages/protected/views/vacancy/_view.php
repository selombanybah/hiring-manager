<div class="post">
    <div class="title">
        <?php echo CHtml::link(CHtml::encode($data->vacancy_code . " " . $data->designation), $data->url); ?>
    </div>
    <div class="author">
        posted by <?php echo $data->createdBy->username . ' on ' . date('F j, Y, g:i a',strtotime($data->created)); ?>
    </div>
    <div class="content">
		
	<b><?php echo CHtml::encode($data->getAttributeLabel('emp_type')); ?>:</b>
	<?php echo CHtml::encode($data->emp_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('department')); ?>:</b>
	<?php echo CHtml::encode($data->department); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_vacancy')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_vacancy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_hiring')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_hiring); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('edu_qualification')); ?>:</b>
	<?php echo CHtml::encode($data->edu_qualification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age_on')); ?>:</b>
	<?php echo CHtml::encode($data->age_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('experience')); ?>:</b>
	<?php echo CHtml::encode($data->experience); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_salary')); ?>:</b>
	<?php echo CHtml::encode($data->min_salary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_salary')); ?>:</b>
	<?php echo CHtml::encode($data->max_salary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requirements')); ?>:</b>
	<?php echo CHtml::encode($data->requirements); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_date')); ?>:</b>
	<?php echo CHtml::encode($data->last_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log')); ?>:</b>
	<?php echo CHtml::encode($data->log); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hiring_person')); ?>:</b>
	<?php echo CHtml::encode($data->hiring_person); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	*/ ?>
    </div>
    <br/>
    <div class="nav">
        <?php echo CHtml::link("Applicants ({$data->applicantsCount})",$data->url.'#applicants'); ?> |  
        <?php echo CHtml::link("History ({$data->historyCount})",$data->url.'#history'); ?> |
        Last updated on <?php echo date('F j, Y, g:i a',strtotime($data->modified)); ?>
    </div>
</div>