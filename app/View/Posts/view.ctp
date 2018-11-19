<div class="container">
	<div class="row">
		<div class="panel panel-default text-muted">
			<div class="panel-heading"><h4><?php echo ucwords(h($post['Post']['title'])); ?></h4></div>
			<div class="panel-body">
				<p><?php echo h($post['Post']['body']); ?></p>
				<p>
					<small><b>Created:</b> 
						<?php 
							//echo $post['Post']['created'];
							// Instantiate a DateTime with microseconds.
							$d = new DateTime($post['Post']['created']);

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