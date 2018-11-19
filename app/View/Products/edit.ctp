<div class="panel panel-default text-muted">
  <div class="panel-heading"><h4>Edit Product</h4></div>
  <div class="panel-body">
	<br>

<?php
	//echo '<pre>';
	//print_r($this->request->data['Product']['image']); die;

?>

<?php echo $this->Form->create('Product',array('type' => 'file')); ?>

	<div class="col-lg-4 form-group">
		<?php echo $this->Form->input('name',array('class'=>'form-control')); ?>
	</div>

	<div class="col-lg-4 form-group">
		<?php echo $this->Form->input('price',array('class'=>'form-control')); ?>
	</div>

	<?php echo $this->Form->input('id', array('hiddenField' => false)); ?>

	<div class="col-lg-4 form-group">
		<?php
			$category = array('1' => 'Small', '2' => 'Medium', '3' => 'Large');
			echo $this->Form->input(
			    'category',
			    array('options' => $category, 'class'=>'form-control')
			);
		?>
	</div>

	<div class="col-lg-4 form-group">
		<?php echo $this->Form->input('menu_order',array('class'=>'form-control')); ?>
	</div>

	<div class="col-lg-4 form-group">
		<?php echo $this->Form->input('quantity',array('class'=>'form-control')); ?>
	</div>

	<div class="col-lg-4 form-group">
		<?php
			$status = array('1' => 'Active', '0' => 'De-active');
			echo $this->Form->input(
			    'status',
			    array('options' => $status,'class'=>'form-control')
			);
		?>
	</div>

	<div class="col-lg-4 form-group">
		<?php echo $this->Form->file('image',array('class'=>'form-control')); ?>
		<?php
			if(!empty($this->request->data['Product']['image'])) {
		        $imgpath = FULL_BASE_URL.  '/cakephp/documents' . DS . $this->request->data['Product']['image'];
		    } else {
		        $imgpath = FULL_BASE_URL.  '/cakephp/documents' . DS . 'default.png';
		    }
		?>
		
	</div>
	

	<div class="col-lg-3 form-group">
		<img src="<?php echo $imgpath; ?>" class="img-thumbnail" alt="Image" width="100%" >
	</div>

	<div class="col-lg-12 form-group">
		<?php echo $this->Form->input('description', array('rows' => '4','class'=>'form-control')); ?>
	</div>



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