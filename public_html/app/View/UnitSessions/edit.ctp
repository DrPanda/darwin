<div class="unitSessions form">
<?php echo $this->Form->create('UnitSession', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Unit Session'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date_time');
		echo $this->Form->input('name');
	?>
	<?php
		echo $this->Form->input('csv_file',  array('label' => 'choose your csv file', 'type' => 'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UnitSession.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('UnitSession.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Unit Sessions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
