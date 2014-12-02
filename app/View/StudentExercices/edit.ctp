<div class="studentExercices form">
<?php echo $this->Form->create('StudentExercice'); ?>
	<fieldset>
		<legend><?php echo __('Edit Student Exercice'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('student_id');
		echo $this->Form->input('exercice_id');
		echo $this->Form->input('date');
		echo $this->Form->input('user_id');
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('StudentExercice.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('StudentExercice.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
<<<<<<< HEAD
		<li><?php echo $this->Html->link(__('List Exercices'), array('controller' => 'exercices', 'action' => 'index')); ?> </li>
=======
>>>>>>> anais
		<li><?php echo $this->Html->link(__('New Exercice'), array('controller' => 'exercices', 'action' => 'add')); ?> </li>
	</ul>
</div>
