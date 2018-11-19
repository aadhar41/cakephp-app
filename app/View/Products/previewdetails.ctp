<?php
	//print_r($previewdetails); die;
	
	if(!empty($previewdetails['Product']['image'])) {
        $imgpath = FULL_BASE_URL.  '/cakephp/documents' . DS . $previewdetails['Product']['image'];
    } else {
        $imgpath = FULL_BASE_URL.  '/cakephp/documents' . DS . 'default.png';
    }

    $name = $previewdetails['Product']['name'];
    $description = $previewdetails['Product']['description'];
    $created = $previewdetails['Product']['created'];
?>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">

	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><?php echo ucwords($name); ?></h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="thumbnail">
							<img src="<?php echo $imgpath; ?>" alt="Lights" width="100%">
							<div class="caption">
								<p><b>Description : </b><?php echo $description; ?></p>
								<p><b>Created : </b>
									<?php 
						                // Instantiate a DateTime with microseconds.
						                $d = new DateTime($created);

						                // Output the date with microseconds.
						                echo $d->format('F d, Y H:i:s'); // 2011-01-01T15:03:01.012345
						            ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>

		</div>

	</div>

</div>

<script>
	$("#myModal").modal();
</script>


<?php exit(); ?>