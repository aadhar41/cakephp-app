
<div class="panel panel-default text-muted">
  <div class="panel-heading"><h4>Add Product</h4></div>
  <div class="panel-body">
	
	<!--<h2>Add Product</h2>-->
	<br>
<?php echo $this->Form->create('Product'); ?>
	
	<div class="col-lg-4 form-group">
		<?php echo $this->Form->input('name',array('class'=>'form-control'));?>
	</div>

	<div class="col-lg-4 form-group">
		<?php echo $this->Form->input('price',array('type' => 'text','class'=>'form-control')); ?>
	</div>
	
	<div class="col-lg-4 form-group">
	<?php 
		$category = array('1' => 'Small', '2' => 'Medium', '3' => 'Large');
		echo $this->Form->input(
		    'category',
		    array('options' => $category, 'default' => 'm','class'=>'form-control')
		);
	?>
	</div>

	<div class="col-lg-4 form-group">
		<?php echo $this->Form->input('menu_order',array('class'=>'form-control')); ?>
	</div>


	<div class="col-lg-4 form-group">
		<?php echo $this->Form->input('quantity',array('type' => 'text','class'=>'form-control')); ?>
	</div>

	<div class="col-lg-4 form-group">
		<?php
			$status = array('1' => 'Active', '0' => 'De-active');
			echo $this->Form->input(
			    'status',
			    array('options' => $status, 'default' => 'm','class'=>'form-control')
			);
		?>
	</div>

	<div class="col-lg-12 form-group">
		<?php echo $this->Form->file('image',array('class'=>'form-control')); ?>
	</div>


	<div class="col-lg-12 form-group">
		<?php echo $this->Form->input('description', array('rows' => '4','class'=>'form-control')); ?>
	</div>


	<div class="col-lg-4">
		<?php
			echo $this->Form->end(array(
			    'label' => __('Save Product'),
			    'class' => 'btn btn-primary',
			    'div' => array(
			        'class' => 'control-group',
			     ),
			    'before' => '<div class="controls">',
			    'after' => '</div>'
			));
		?>
	</div>

<br>
<br>


</div>
</div>