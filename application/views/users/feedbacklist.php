<?php include_once('header.php'); ?>

<div class="container">
<h1><?php echo $title; ?></h1>
<div class="table-responsive">
<table class="table table-hover tablesorter">
	<thead>
		<tr>
			<th class="header">S.no</th>
			<th class="header">Name</th>
			<th class="header">Email</th>
			<th class="header">Feedback</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		$ctr = 0;
		foreach ($feedbackinfo as $row){
			$ctr++;
			?>
			<tr>
				<td><?php echo $ctr; ?></td>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->email; ?></td>
				<td><?php echo $row->feedback; ?></td>
			</tr>
	<?php 	} ?>
 
	</tbody>
</table>
</div>

<div class="center">
	<form method="post" action="<?php echo base_url();?>export/createXLS">
		<input type="submit" name="export" class="btn btn-success" value="Export">
	</form>
</div>
</div>


<?php include_once('footer.php'); ?>
