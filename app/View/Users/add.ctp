<div class="panel panel-default text-muted">
	<div class="panel-body">
		<div class="users form">
		<?php echo $this->Form->create('User'); ?>
		    <fieldset>
		        <legend><?php echo __('Add User'); ?></legend>
		        <div class="col-lg-4 form-group">
			        <?php echo $this->Form->input('username',array('class'=>'form-control')); ?>
		        </div>
		        
		        <div class="col-lg-12"></div>

		        <div class="col-lg-4 form-group">
			        <?php echo $this->Form->input('password',array('class'=>'form-control')); ?>
		        </div>

		        <div class="col-lg-12"></div>

			    <div class="col-lg-4 form-group">
			    <?php
			        echo $this->Form->input('role', array(
			            'options' => array('admin' => 'Admin', 'author' => 'Author'),
			            'class'=>'form-control'
			        ));
			    ?>
			    </div>

		    </fieldset>

		<?php //echo $this->Form->end(__('Submit')); ?>

			<div class="col-lg-4">
				<?php
					echo $this->Form->end(array(
					    'label' => __('Submit'),
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