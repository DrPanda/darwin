<div class="unitSessions view">
<h2><?php echo __('Unit Session'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($unitSession['UnitSession']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Time'); ?></dt>
		<dd>
			<?php echo h($unitSession['UnitSession']['date_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($unitSession['UnitSession']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Unit Session'), array('action' => 'edit', $unitSession['UnitSession']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Unit Session'), array('action' => 'delete', $unitSession['UnitSession']['id']), array(), __('Are you sure you want to delete # %s?', $unitSession['UnitSession']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Unit Sessions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit Session'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Students'); ?></h3>
	<?php if (!empty($unitSession['Student'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Session Id'); ?></th>
		<th><?php echo __('Picture'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Comment User'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($unitSession['Student'] as $student): ?>
		<tr>
			<td><?php echo $student['id']; ?></td>
			<td><?php echo $student['session_id']; ?></td>
			<td><?php echo $student['picture']; ?></td>
			<td><?php echo $student['first_name']; ?></td>
			<td><?php echo $student['last_name']; ?></td>
			<td><?php echo $student['comment']; ?></td>
			<td><?php echo $student['comment_user']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'students', 'action' => 'view', $student['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'students', 'action' => 'edit', $student['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'students', 'action' => 'delete', $student['id']), array(), __('Are you sure you want to delete # %s?', $student['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
