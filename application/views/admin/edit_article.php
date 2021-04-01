<?php include_once('header.php'); ?>

<div class="container" style="margin-top: 40px;">
	<div class="row">
		<div class="col-md-6">
			<h3>Edit Article</h3>
			<?php echo form_open("admin/update_article/{$article->id}") ?>
			<?php //echo form_hidden('id',$article->id); ?>			
		  <div class="form-group">
		    <label for="Article Title">Article Title:</label>
		    <?php echo form_input(['class'=>'form-control','name'=>'article_title', 'value'=>set_value('article_title',$article->article_title)]); ?> 
		  </div>
		  <?php echo form_error('article_title'); ?>
		  <div class="form-group">
		    <label for="Article Body">Article Body:</label>
		    <?php echo form_textarea(['class'=>'form-control', 'name'=>'article_body', 'value'=>set_value('article_body',$article->article_body) ]); ?> 
		  </div>
		  <?php echo form_error('article_body'); echo br(1); ?>
		    <?php echo form_submit(['class'=>'btn btn-success','value'=>'Update']); ?> 
		    <?php echo form_reset(['class'=>'btn btn-primary','value'=>'Reset']); ?> 
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<?php include_once('footer.php'); ?>
