<div class="studentExercices view">
<h2><?php echo __('Student Exercice'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($studentExercice['StudentExercice']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($studentExercice['Student']['picture'], array('controller' => 'students', 'action' => 'view', $studentExercice['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exercice'); ?></dt>
		<dd>
			<?php echo $this->Html->link($studentExercice['Exercice']['content'], array('controller' => 'exercices', 'action' => 'view', $studentExercice['Exercice']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($studentExercice['StudentExercice']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($studentExercice['User']['login'], array('controller' => 'users', 'action' => 'view', $studentExercice['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($studentExercice['StudentExercice']['comment']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Student Exercice'), array('action' => 'edit', $studentExercice['StudentExercice']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Student Exercice'), array('action' => 'delete', $studentExercice['StudentExercice']['id']), array(), __('Are you sure you want to delete # %s?', $studentExercice['StudentExercice']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Student Exercices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Exercice'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercices'), array('controller' => 'exercices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercice'), array('controller' => 'exercices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
