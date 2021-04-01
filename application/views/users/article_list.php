<?php include_once('header.php'); ?>

<div class="container">
	<a class="btn btn-primary" style="margin-top:10px;" href="<?php echo base_url()?>export">View Feedback</a>
</div>


<div style="padding: 50px;" >

	<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" id="myInput">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>

	<table  class="table table-bordered" style="text-align: center;" id="myTable">
		<thead>
			<tr>
				<td>Sno.</td>
				<td>Article image</td>
				<td>Article title</td>
				<td>Article body</td>
				<td>Published on</td>
			</tr>
		</thead>
		<tbody>
			<?php if(count($articles)):
 $count=$this->uri->segment(3); 

 ?> 
<?php foreach ($articles as $art): ?>
	<tr>
       <td><?=    ++$count; ?></td>
        <?php if(!is_null($art->image_path)) { ?>
        <td><img src="<?php echo $art->image_path ?>" alt="" width="70" height="70"></td>
        <?php } ?>
		<td><?php echo anchor("admin/{$art->id}", $art->article_title); ?></td>
		<td><?=  $art->article_body; ?></td>
		<td><?php echo date('d M y H:i:s',strtotime($art->created_at)) ?></td>
	</tr>
	<?php endforeach; ?>
<?php else: ?>
	<tr>
	<td colspan="3">Not data available</td>
	</tr>
   <?php endif; ?>
		</tbody>
	</table>


<?php echo $this->pagination->create_links(); ?>
</div>
<?php include_once('footer.php'); ?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#myInput").on("keyup",function(){
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function(){
				$(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
			});
		});
	});
</script>
