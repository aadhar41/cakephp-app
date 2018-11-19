<div class="panel panel-default text-muted">
	<div class="panel-heading"><h4>Add Post</h4></div>
	<div class="panel-body">
		<br>
		<?php echo $this->Form->create('Post'); ?>

		<div class="col-lg-12">
			<div class="col-lg-6 form-group">
				<?php echo $this->Form->input('title',array('class'=>'form-control')); ?>
			</div>
		</div>

		<div class="col-lg-12">
			<div class="col-lg-6 form-group">
				<?php echo $this->Form->input('body', array('rows' => '4','class'=>'form-control')); ?>
			</div>
		</div>


			<?php //echo $this->Form->end('Save Post'); ?>

		<div class="col-lg-12">
			<div class="col-lg-4">
				<?php
					echo $this->Form->end(array(
					    'label' => __('Save Post'),
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