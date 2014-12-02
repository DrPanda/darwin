<div class="exercices view">
<h2><?php echo __('Exercice'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($exercice['Exercice']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subject'); ?></dt>
		<dd>
			<?php echo h($exercice['Exercice']['subject']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($exercice['Exercice']['content']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Exercice'), array('action' => 'edit', $exercice['Exercice']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Exercice'), array('action' => 'delete', $exercice['Exercice']['id']), array(), __('Are you sure you want to delete # %s?', $exercice['Exercice']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercice'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Student Exercices'), array('controller' => 'student_exercices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Exercice'), array('controller' => 'student_exercices', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Student Exercices'); ?></h3>
	<?php if (!empty($exercice['StudentExercice'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Exercice Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($exercice['StudentExercice'] as $studentExercice): ?>
		<tr>
			<td><?php echo $studentExercice['id']; ?></td>
			<td><?php echo $studentExercice['student_id']; ?></td>
			<td><?php echo $studentExercice['exercice_id']; ?></td>
			<td><?php echo $studentExercice['date']; ?></td>
			<td><?php echo $studentExercice['user_id']; ?></td>
			<td><?php echo $studentExercice['comment']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'student_exercices', 'action' => 'view', $studentExercice['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'student_exercices', 'action' => 'edit', $studentExercice['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'student_exercices', 'action' => 'delete', $studentExercice['id']), array(), __('Are you sure you want to delete # %s?', $studentExercice['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Student Exercice'), array('controller' => 'student_exercices', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
