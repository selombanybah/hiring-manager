<?php
$this->breadcrumbs=array(
	'Vacancy',
);

$this->menu=array(
	array('label'=>'Create Vacancy', 'url'=>array('create')),
	array('label'=>'Manage Vacancy', 'url'=>array('admin')),
);
?>

<h1>Vacancy</h1>         

<form action="" method="post" action="<?=$this->createAbsoluteUrl("vacancy/index")?>">
Filter with   
            <select name="active" onChange="this.form.submit();">
                <option value="y" <? if($active=='y') echo "selected"; ?>>Active</option>
                <option value="n" <? if($active=='n') echo "selected"; ?>>InActive</option>
                <option value="both" <? if($active=='both') echo "selected"; ?>>Both</option>
            </select>
</form>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
