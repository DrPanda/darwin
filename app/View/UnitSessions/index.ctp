<div class="col-lg-12">
	<h2><?php echo __('Sessions'); ?></h2>
	<h3><?php echo $this->Html->link(__('New session'), array('controller' => 'unitSessions', 'action' => 'add')); ?></h3>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<?php if ($authUser["role"] == "admin") { ?>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<?php } ?>
		<th><?php echo $this->Paginator->sort('date_time'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($unitSessions as $unitSession): ?>
	<tr>
		<?php if ($authUser["role"] == "admin") { ?>
		<td><?php echo h($unitSession['UnitSession']['id']); ?>&nbsp;</td>
		<?php } ?>
		<td><?php echo h($unitSession['UnitSession']['date_time']); ?>&nbsp;</td>
		<td><?php echo h($unitSession['UnitSession']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $unitSession['UnitSession']['id'])); ?>
			<?php if ($authUser["role"] == "admin") { ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $unitSession['UnitSession']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $unitSession['UnitSession']['id']), array(), __('Are you sure you want to delete # %s?', $unitSession['UnitSession']['id'])); ?>
			<?php } ?>
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