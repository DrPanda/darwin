<div class="col-md-offset-3 col-lg-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-sm-6 sol-xs-12">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
<?php echo $this->Html->image('logo.png', array('alt' => 'CakePHP')); ?>
    <fieldset>
        <?php
        	echo $this->Form->input('username');
       		echo $this->Form->input('password');
    	?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>