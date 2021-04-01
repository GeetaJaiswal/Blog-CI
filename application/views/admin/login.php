<?php include_once('header.php'); ?>

<div class="container" style="margin-top: 40px;">
	<div class="row">
		<div class="col-md-6">
			<h3>Admin Form</h3>

			<?php if($error = $this->session->flashdata('login_failed')): ?>
				<div class="row mx-50">
					<div class="alert alert-danger">
						<?php echo $error; ?>
					</div>
				</div>
			<?php endif; ?>	

			<?php if($registered = $this->session->flashdata('user_added')): ?>
				<div class="row mx-50">
					<div class="alert alert-success">
						<?php echo $registered; ?>
					</div>
				</div>
			<?php endif; ?>	

			<?php echo form_open('login/index'); ?>
		  <div class="form-group">
		    <label for="email">Username:</label>
		    <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter username','name'=>'uname', 'value'=>set_value("uname")]); ?> 
		  </div>
		  <?php echo form_error('uname'); ?>
		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <?php echo form_password(['class'=>'form-control','placeholder'=>'Enter password', 'name'=>'pass', 'value'=>set_value("pass") ]); ?> 
		  </div>
		  <?php echo form_error('pass'); echo br(1); ?>
		    <?php echo form_submit(['class'=>'btn btn-success','value'=>'Submit']); ?> 
		    <?php echo form_reset(['class'=>'btn btn-primary','value'=>'Reset']); ?> 
		    <?php echo anchor('register/', 'Sign up?', 'class="link-class"'); ?>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<?php include_once('footer.php'); ?>
