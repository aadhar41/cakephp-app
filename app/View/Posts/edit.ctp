<div class="panel panel-default text-muted">
  <div class="panel-heading"><h4>Edit Post</h4></div>
  <div class="panel-body">
	<br>
	<?php echo $this->Form->create('Post'); ?>

	<div class="col-lg-4 form-group">
		<?php echo $this->Form->input('title',array('class'=>'form-control')); ?>
	</div>

	<div class="col-lg-12 form-group">
		<?php echo $this->Form->input('body', array('rows' => '4','class'=>'form-control')); ?>
	</div>

	<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>



	<div class="col-lg-4">
		<?php
			echo $this->Form->end(array(
			    'label' => __('Update'),
			    'class' => 'btn btn-primary',
			    'div' => array(
			        'class' => 'control-group',
			     ),
			    'before' => '<div class="controls">',
			    'after' => '</div>'
			));
		?>
	</div>

 </div>
 </div>
</div>