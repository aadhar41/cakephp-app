<div class="panel panel-default text-muted">
	<div class="panel-body">
		<div class="users form">
		<?php echo $this->Form->create('General'); ?>
		    <fieldset>
		        <legend><?php echo __('Send Email'); ?></legend>
				
				<div class="col-lg-4 form-group">
			        <?php echo $this->Form->input('fullname',array('class'=>'form-control')); ?>
		        </div>

		        <div class="col-lg-4 form-group">
			    <?php echo $this->Form->input('email',array('class'=>'form-control')); ?>
		        </div>
		        

		        <div class="col-lg-4 form-group">
			    	<?php echo $this->Form->input('subject',array('class'=>'form-control')); ?>
		        </div>

		        <div class="col-lg-12 form-group">
				    <?php
				        echo $this->Form->input('birth_dt', array(
						    'label' => 'Date Of Birth  ',
						    'dateFormat' => 'MDY',
						    'minYear' => date('Y') - 70,
						    'maxYear' => date('Y') - 18,
						    'class'=>'form-control',
						    'div' => array('class' => 'form-inline'),
					        'between' => '<div class="form-group" style="margin-left:6px;">',
					        'separator' => '</div><div class="form-group" style="margin-left:4px;">',
					        'after' => '</div>'
						   
						));
					?>

			    </div>
			    
		        <div class="col-lg-6 form-group">
				<?php
			        echo $this->Form->input('message',array('label'=>'Message', 'rows'=>4, 'class'=>'form-control'));
			    ?>
			    </div>

		    </fieldset>
			
		    <div class="col-lg-6 form-group">
			<?php
				echo $this->Form->end(array(
				    'label' => __('Send'),
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