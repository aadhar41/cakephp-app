<div class="panel panel-default text-muted">
	<div class="panel-body">
		<div class="users form">
			<?php echo $this->Flash->render('auth'); ?>
			<?php echo $this->Form->create('User'); ?>
		    <fieldset>
		        <legend><?php echo ucwords(__('Please enter your username and password')); ?></legend>
		        <div class="col-lg-4 form-group">
			        <?php echo $this->Form->input('username',array('class'=>'form-control')); ?>
		        </div>

		        <div class="col-lg-4 form-group">
			        <?php echo $this->Form->input('password',array('class'=>'form-control')); ?>
		        </div>
		    </fieldset>

			<div class="col-lg-4">
				<?php
					echo $this->Form->end(array(
					    'label' => __('Login'),
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