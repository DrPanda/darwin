<div class="chats view">
<h2><?php echo __('Chat'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($chat['Chat']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chat['Student']['picture'], array('controller' => 'students', 'action' => 'view', $chat['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chat['User']['login'], array('controller' => 'users', 'action' => 'view', $chat['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($chat['Chat']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Time'); ?></dt>
		<dd>
			<?php echo h($chat['Chat']['date_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Chat'), array('action' => 'edit', $chat['Chat']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Chat'), array('action' => 'delete', $chat['Chat']['id']), array(), __('Are you sure you want to delete # %s?', $chat['Chat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Chats'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chat'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
