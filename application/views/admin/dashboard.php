<?php include_once('header.php'); ?>

<div class="container">
	<div class="row" style="margin-top: 40px; margin-bottom: 30px;">
		<a href="<?php echo base_url('admin/add_article'); ?>" class="btn btn-primary">Add Articles</a>
	</div>


	<?php if($success = $this->session->flashdata('article_added')): ?>
				<div class="row mx-50">
					<div class="alert alert-success">
						<?php echo $success; ?>
					</div>
				</div>
			<?php endif; ?>	

	<?php if($unsuccess = $this->session->flashdata('article_not_deleted')): ?>
				<div class="row mx-50">
					<div class="alert alert-danger">
						<?php echo $unsuccess; ?>
					</div>
				</div>
			<?php endif; ?>	

			<?php if($success = $this->session->flashdata('article_deleted')): ?>
				<div class="row mx-50">
					<div class="alert alert-success">
						<?php echo $success; ?>
					</div>
				</div>
			<?php endif; ?>	

			<?php if($success = $this->session->flashdata('article_edited')): ?>
				<div class="row mx-50">
					<div class="alert alert-success">
						<?php echo $success; ?>
					</div>
				</div>
			<?php endif; ?>	

			<?php if($unsuccess = $this->session->flashdata('article_not_edited')): ?>
				<div class="row mx-50">
					<div class="alert alert-danger">
						<?php echo $unsuccess; ?>
					</div>
				</div>
			<?php endif; ?>	
				

<?php //echo $this->db->last_query(); ?>

	<div class="table">
	<table>
		<thead>
			<tr>
				<td>Sno.</td>
				<td>Article Title</td>
				<td>Article body</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>
		</thead>
		<tbody>

			<?php if(count($articles)): ?> 
				<?php $count = $this->uri->segment(3); ?>
			<?php foreach ($articles as $article): ?>
			<tr>
				<td><?php echo ++$count; ?></td>
				<td><?php echo $article->article_title; ?></td>
				<td><?php echo $article->article_body; ?></td>
				<td><?=  anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-primary']);  ?></td>
				<td>
				<?php
				echo form_open('admin/delete_article');
		        echo form_hidden('id',$article->id);
		        echo form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']);
		        echo form_close();
				?>
				</td>
			</tr>
		<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="3">No Data Available</td>
			</tr>
	<?php endif;?>
		</tbody>
	</table>
</div>

<?php echo $this->pagination->create_links(); ?>
</div>

<?php include_once('footer.php'); ?>
	
