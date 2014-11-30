<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('styles');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->script('jquery');
		echo $this->Html->script('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<?php if ($authUser) { ?>
			<div id="header">
				<div class="col-lg-2 col-md-2 col-sm-6 col-sm-6">
					<?php //echo $this->Html->link( $this->Html->image('logo.png', array('alt' => 'CakePHP')), array( 'controller' => 'students', 'action' => 'home')); ?>
					<?php echo $this->Html->image('logo.png', array('alt' => 'CakePHP')); ?>
				</div>
				<div class="col-lg-10 col-md-10 col-sm-6 col-xs-10">
				<div class="dropdown">
				  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
				    Menu
				    <span class="caret"></span>
				  </button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					  <li role="presentation"><?php echo $this->Html->link('home',  '/students', array('role' => 'menuitem', 'tabindex' => "-1")); ?></li>
					  <?php if ($authUser["role"] == "admin") { ?>
					  	<li role="presentation"><?php echo $this->Html->link('edit users',  '/users', array('role' => 'menuitem', 'tabindex' => "-1")); ?></li>
					  <li role="presentation"><?php echo $this->Html->link(__('New Unit Session'), array('action' => 'add')); ?></li>
					  <?php } ?>
					  <li role="presentation"><?php echo $this->Html->link('logout',  '/users/logout', array('role' => 'menuitem', 'tabindex' => "-1")); ?></li>
				  	</ul>
				</div>
				</div>
			</div>
		<?php } ?>
		<div id="content">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php // echo $this->element('sql_dump'); ?>
</body>
</html>
