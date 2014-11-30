<div class="studentExercices index">
	<h2><?php echo __('Student Exercices'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('student_id'); ?></th>
			<th><?php echo $this->Paginator->sort('exercice_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($studentExercices as $studentExercice): ?>
	<tr>
		<td><?php echo h($studentExercice['StudentExercice']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($studentExercice['Student']['picture'], array('controller' => 'students', 'action' => 'view', $studentExercice['Student']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($studentExercice['Exercice']['content'], array('controller' => 'exercices', 'action' => 'view', $studentExercice['Exercice']['id'])); ?>
		</td>
		<td><?php echo h($studentExercice['StudentExercice']['date']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($studentExercice['User']['login'], array('controller' => 'users', 'action' => 'view', $studentExercice['User']['id'])); ?>
		</td>
		<td><?php echo h($studentExercice['StudentExercice']['comment']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $studentExercice['StudentExercice']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $studentExercice['StudentExercice']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $studentExercice['StudentExercice']['id']), array(), __('Are you sure you want to delete # %s?', $studentExercice['StudentExercice']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Student Exercice'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercices'), array('controller' => 'exercices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercice'), array('controller' => 'exercices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
