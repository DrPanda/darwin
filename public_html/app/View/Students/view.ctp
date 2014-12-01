<div class="col-lg-12">
<h2><?php echo __('Student'); ?></h2>
	<div class="col-xs-6 col-sm-3 col-md-3 col-lg-1">
	    <a href="#" class="thumbnail">
	      <?php echo $this->Html->image($student['Student']['picture'].".jpg", array('alt' => 'CakePHP')); ?>
	    </a>
	    <?php if ($authUser["role"] == "admin") { ?>
	    	<?php echo $this->Html->link(__('Edit Student'), array('action' => 'edit', $student['Student']['id'])); ?>
	   	<?php } ?>
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
				<?php echo $session; ?>
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

	<div class="related">
	<h3><?php echo __('Student Exercices'); ?></h3>
	<?php if (!empty($student['StudentExercice'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Exercice Id'); ?></th>
		<th><?php echo __('Valid'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($student['StudentExercice'] as $studentExercice): ?>
		<tr>
			<td><?php echo $studentExercice['exercice_id']; ?></td>
			<td><?php echo $studentExercice['is_valid']; ?></td>
			<td><?php echo $studentExercice['updated']; ?></td>
			<td><?php echo $studentExercice['user_id']; ?></td>
			<td class="actions">
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#edit_exercice" data-exerciceid="<?php echo $studentExercice['id']; ?>" data-exercicename="<?php echo $studentExercice['exercice_id']; ?>">
			edit
			</button>
				<?php //echo $this->Html->link(__('Edit'), array('controller' => 'student_exercices', 'action' => 'edit' 'class' => 'btn btn-primary btn-lg', 'data-toggle' => "modal", 'data-target' => "#myModal", $studentExercice['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'student_exercices', 'action' => 'delete', $studentExercice['id']), array(), __('Are you sure you want to delete # %s?', $studentExercice['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_exercice">
  Add exercice
</button>

<!-- Modal -->
<div class="modal fade" id="add_exercice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add exercice</h4>
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create('StudentExercice', array('action' => 'add')); ?>
		<fieldset>
			<?php
				echo $this->Form->hidden('student_id', array('value' => $student['Student']['id']));
				echo $this->Form->input('exercice_id', $exercices);
				echo $this->Form->hidden('user_id', array('value' => $authUser["id"]));
				echo $this->Form->select('is_valid', array(true => 'True', false => 'False'));
			?>
			</fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <?php echo $this->Form->end(__('Submit')); ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit_exercice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit exercice</h4>
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create('StudentExercice', array(
    'url' => array('controller' => 'Students', 'action' => 'edit_exercice'))); ?>
		<fieldset>
			<?php
				echo $this->Form->hidden('id');
				echo $this->Form->hidden('student_id', array('value' => $student['Student']['id']));
				echo $this->Form->hidden('user_id', array('value' => $authUser["id"]));
				echo $this->Form->select('is_valid', array(true => 'True', false => 'False'));
			?>
			</fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <?php echo $this->Form->end(__('Submit')); ?>
      </div>
    </div>
  </div>
</div>
</div>

<div class="col-lg-12">
<h2>Chat</h2>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<div class="list-group">
		<?php foreach($chats as $chat) { ?>
			  <a href="#" class="list-group-item">
			    <h4 class="list-group-item-heading"><?= $chat['Chats']['user_id'] ?></h4>
			    <p class="list-group-item-text"><?= $chat['Chats']['message'] ?></p>
			  </a>
		<?php } ?>
		<a href="#" class="list-group-item">
		    <h4 class="list-group-item-heading">New message</h4>
		    <div class="list-group-item-text">
		    <?php
		    echo $this->Form->create('Chat', array('action' => 'add'));
		    	echo $this->Form->hidden('student_id', array('value' => $student['Student']['id']));
		    	echo $this->Form->hidden('user_id', array('value' => $authUser["id"]));
		    	echo $this->Form->input('message');
		    	echo $this->Form->end(__('Submit')); ?>
		    </div>
		  </a>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#edit_exercice').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget)
		  var id = button.data('exerciceid')
		  var name = button.data('exercicename')
		  var modal = $(this)
		  modal.find('.modal-title').text('New message to ' + name)
		  modal.find('.modal-body input[name="data[StudentExercice][id]"]').val(id)
	})
</script>