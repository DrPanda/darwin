<?php if ($authUser["role"] == "admin") { ?>
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
	</ul>
</div>
<?php } ?>
<div class="related">
	<?php if (!empty($unitSession['Student'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<?php if ($authUser["role"] == "admin") { ?>
			<th><?php echo __('Id'); ?></th>
		<?php } ?>
		<th><?php echo __('Picture'); ?></th>
		<th><?php echo __('Session Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<?php if ($authUser["role"] == "admin") { ?>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Comment User'); ?></th>
		<?php } ?>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($unitSession['Student'] as $student): ?>
		<tr>
			<?php if ($authUser["role"] == "admin") { ?>
				<td><?php echo $student['id']; ?></td>
			<?php } ?>
			<td>
				<a href="#" class="thumbnail">
			      <?php echo $this->Html->image($student['picture'].".jpg", array('alt' => 'CakePHP')); ?>
			    </a>
			</td>
			<td><?php echo $student['session_id']; ?></td>
			<td><?php echo $student['first_name']; ?></td>
			<td><?php echo $student['last_name']; ?></td>
			<?php if ($authUser["role"] == "admin") { ?>
				<td><?php echo $student['comment']; ?></td>
				<td><?php echo $student['comment_user']; ?></td>
			<?php } ?>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'students', 'action' => 'view', $student['id'])); ?>
				<?php if ($authUser["role"] == "admin") { ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'students', 'action' => 'edit', $student['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'students', 'action' => 'delete', $student['id']), array(), __('Are you sure you want to delete # %s?', $student['id'])); ?>
				<?php } ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
