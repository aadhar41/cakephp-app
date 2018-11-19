<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
<!-- 	<title>
		<?php //echo $cakeDescription ?>:
		<?php //echo $this->fetch('title'); ?>
	</title> -->
	
	<title>
		CakePHP
	</title>
	<?php
		echo $this->Html->meta('icon');

		// echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<?php echo $this->Html->css('bootstrap.min.css');?>
	<?php echo $this->Html->css('font-awesome.css');?>
	<?php echo $this->Html->script('jquery.min.js');?>
	<?php echo $this->Html->script('bootstrap.min.js');?>
	<style>
	.footer {
	    position: inherit;
	    left: 0;
	    bottom: 0;
	    width: 100%;
	    /*background-color: transparent;*/
	    /*color: white;*/
	    text-align: center;
	}
	</style>
</head>
<body>
	<div id="container" class="container">
		<div id="header" class="">
			<h1><?php //echo $this->Html->link($cakeDescription, 'https://cakephp.org'); ?></h1>
			<p>
			<?php //echo $this->Html->link('Blog',array('controller'=>'posts','action' => 'index')); ?>
			<!-- | -->
            <?php //echo $this->Html->link('Sign Up',array('controller'=>'users','action' => 'add')); ?>
			<!-- | -->
            <?php //echo $this->Html->link('Login',array('controller'=>'users','action' => 'login')); ?>
            <!-- | -->
            <?php //echo $this->Html->link('Email',array('controller'=>'General','action' => 'index')); ?>
            <!-- | -->
            <?php //echo $this->Html->link('Products',array('controller'=>'Products','action' => 'index')); ?>
            <!-- | -->
            <?php //echo $this->Html->link('Logout',array('controller'=>'users','action' => 'logout')); ?>
	        </p>
			


			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">CakePHP</a>
					</div>
					<ul class="nav navbar-nav" id="navbar-nav">
						<li class=" nav-menu">
					<?php echo $this->Html->link('Blog',array('controller'=>'posts','action' => 'index')); ?>
						</li>
						<li class="nav-menu">
					<?php echo $this->Html->link('Sign Up',array('controller'=>'users','action' => 'add')); ?>
						</li>
			
						<li class="nav-menu">
					<?php echo $this->Html->link('Email',array('controller'=>'General','action'=>'index')); ?>
						</li>						
						<li class="nav-menu">
					<?php echo $this->Html->link('Products',array('controller'=>'Products','action'=>'index')); ?>
						</li>
						<li class="nav-menu">
					<?php 
						if ($this->Session->read('Auth.User')) {
							echo $this->Html->link('Logout',array('controller'=>'users','action' =>'logout'));
						} else {
							echo $this->Html->link('Login',array('controller'=>'users','action' => 'login'));
						}
					?>
						</li>
					</ul>
				</div>
			</nav>

			<?php 
				// echo "<pre>";
				// print_r($_SESSION);
			?>

		</div>
		<div id="content" class="row">
			<?php
				// CakePHP 2.7+
				echo $this->Flash->render();
				echo $this->Flash->render('auth');
			?>

			<?php echo $this->fetch('content'); ?>
		</div>

		<div id="footer" class="footer">
			<?php 
				echo ' @ '.date('Y');
				// echo $this->Html->link(
				// 	$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
				// 	'https://cakephp.org/',
				// 	array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				// );
			?>
			<p>
				<?php //echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
	


</body>
</html>
