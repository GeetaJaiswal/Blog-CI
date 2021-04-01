<?php include_once('header.php'); ?>

<div class="container" style="margin-top: 40px;">
	<div class="row">
		<div class="col-md-6">
			<h3>Add Article</h3>
			<?php echo form_open_multipart('admin/user_validation'); ?>
			<?php echo form_hidden('user_id',$this->session->userdata("id")); ?>

			<?php if($unsuccess = $this->session->flashdata('article_not_added')): ?>
				<div class="row mx-50">
					<div class="alert alert-danger">
						<?php echo $unsuccess; ?>
					</div>
				</div>
			<?php endif; ?>	
			
		  <div class="form-group">
		    <label for="Article Title">Article Title:</label>
		    <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter article title','name'=>'article_title', 'value'=>set_value("article_title")]); ?> 
		  </div>
		  <?php echo form_error('article_title'); ?>
		  <div class="form-group">
		    <label for="Article Body">Article Body:</label>
		    <?php echo form_textarea(['class'=>'form-control','placeholder'=>'Enter article body', 'name'=>'article_body', 'value'=>set_value("article_body") ]); ?> 
		  </div>
		  <?php echo form_error('article_body'); echo br(1); ?>

			<div class="form-group">
		    <label for="Select Image">Select Image:</label>
		    <?php echo form_upload(['name'=>'userfile']); ?> 
		  </div>
		  	<?php if(isset($upload_error))
		  	{ 
		  		echo $upload_error;
		  	} 
		   	?>


		    <?php echo form_submit(['class'=>'btn btn-success','value'=>'Submit']); ?> 
		    <?php echo form_reset(['class'=>'btn btn-primary','value'=>'Reset']); ?> 
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<?php include_once('footer.php'); ?>
