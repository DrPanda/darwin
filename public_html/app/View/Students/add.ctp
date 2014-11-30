<div class="students form">
<?php echo $this->Form->create('Student'); ?>
	<fieldset>
		<legend><?php echo __('Add Student'); ?></legend>
	<?php
		echo $this->Form->input('session_id');
		echo $this->Form->input('picture');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('comment');
		echo $this->Form->input('comment_user');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Unit Sessions'), array('controller' => 'unit_sessions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit Session'), array('controller' => 'unit_sessions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Student Exercices'), array('controller' => 'student_exercices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Exercice'), array('controller' => 'student_exercices', 'action' => 'add')); ?> </li>
	</ul>
</div>
