<div class="exercices form">
<?php echo $this->Form->create('Exercice'); ?>
	<fieldset>
		<legend><?php echo __('Add Exercice'); ?></legend>
	<?php
		echo $this->Form->input('subject');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Exercices'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Student Exercices'), array('controller' => 'student_exercices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Exercice'), array('controller' => 'student_exercices', 'action' => 'add')); ?> </li>
	</ul>
</div>
