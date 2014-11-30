<div class="col-lg-12">
<h2><?php echo __('Student'); ?></h2>
	<div class="col-xs-6 col-sm-3 col-md-3 col-lg-1">
	    <a href="#" class="thumbnail">
	      <img data-src="holder.js/100%x180" alt="...">
	    </a>
	  </div>
	<div class="col-xs-6 col-sm-9 col-md-9 col-lg-11">
		<dl>
			<?php if ($authUser["role"] == "admin") { ?>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($student['Student']['id']); ?>
				&nbsp;
			</dd>
			<?php } ?>
			<dt><?php echo __('Session Id'); ?></dt>
			<dd>
				<?php echo h($student['Student']['session_id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Picture'); ?></dt>
			<dd>
				<?php echo h($student['Student']['picture']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('First Name'); ?></dt>
			<dd>
				<?php echo h($student['Student']['first_name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Last Name'); ?></dt>
			<dd>
				<?php echo h($student['Student']['last_name']); ?>
				&nbsp;
			</dd>
			<?php if ($authUser["role"] == "admin") { ?>
			<dt><?php echo __('Comment'); ?></dt>
			<dd>
				<?php echo h($student['Student']['comment']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Comment User'); ?></dt>
			<dd>
				<?php echo h($student['Student']['comment_user']); ?>
				&nbsp;
			</dd>
			<?php } ?>
		</dl>
	</div>
</div>
<?php if ($authUser["role"] == "admin") { ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Student'), array('action' => 'edit', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Student'), array('action' => 'delete', $student['Student']['id']), array(), __('Are you sure you want to delete # %s?', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Unit Sessions'), array('controller' => 'unit_sessions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit Session'), array('controller' => 'unit_sessions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Student Exercices'), array('controller' => 'student_exercices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Exercice'), array('controller' => 'student_exercices', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Unit Sessions'); ?></h3>
	<?php if (!empty($student['UnitSession'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $student['UnitSession']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Date Time'); ?></dt>
		<dd>
	<?php echo $student['UnitSession']['date_time']; ?>
&nbsp;</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
	<?php echo $student['UnitSession']['name']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Unit Session'), array('controller' => 'unit_sessions', 'action' => 'edit', $student['UnitSession']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php echo __('Related Student Exercices'); ?></h3>
	<?php if (!empty($student['StudentExercice'])): ?>
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
	<?php foreach ($student['StudentExercice'] as $studentExercice): ?>
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
<?php } ?>