<?php foreach($history as $history): ?>
<div class="comment" id="c<?php echo $history->id; ?>">

    <div class="author">
        <?php echo $history->createdBy->username; ?> says:
    </div>

    <div class="time">
        <?php echo date('F j, Y, g:i a',strtotime($history->modified)); ?>
    </div>

    <div class="content">
        <?php echo nl2br(CHtml::encode($history->action)); ?>
    </div>

</div><!-- comment -->
<?php endforeach; ?>