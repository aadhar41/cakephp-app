<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="thumbnail">
				<?php  

					if(!empty($products['Product']['image'])) {
				        $imgpath = FULL_BASE_URL.  '/cakephp/documents' . DS . $products['Product']['image'];
				    } else {
				        $imgpath = FULL_BASE_URL.  '/cakephp/documents' . DS . 'default.png';
				    }
				    
					echo $this->Html->image($imgpath, array('width' => '100%','alt'=>'image'));
				?>
				<div class="caption">
					<p><strong><?php echo h($products['Product']['name']); ?></strong></p>
					<p><?php echo h($products['Product']['description']); ?></p>
					<p><b>Price : </b><?php echo h($products['Product']['price']); ?></p>
					<p><b>Quantity : </b><?php echo h($products['Product']['quantity']); ?></p>
					<p>
						<b>Status : </b>
						<?php 
							if($products['Product']['status']==1) {
							echo 'Active';
						} else {
							echo 'Deactive';
						}
						?>
					</p>

					<p>
						<small><b>Created : </b>
						<?php 
							//echo $products['Product']['created'];
							// Instantiate a DateTime with microseconds.
							$d = new DateTime($products['Product']['created']);

							// Output the date with microseconds.
							echo $d->format('F d, Y H:i:s'); // 2011-01-01T15:03:01.012345
						?>
						</small>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>