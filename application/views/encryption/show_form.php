<!-- plain text to cyphertext
cyphertext to plain text -->

<?php include_once('header.php'); ?>

<div class="container" style="margin-top: 40px;">
	<div class="row">
		<div class="col-md-6">
			<h3>Encryption in codeigniter</h3>
		<?php echo "<div class='error_msg'>";
			echo "</div>"; ?>
			<?php echo form_open('encryption/key_encoder'); ?>
		  <div class="form-group">
		    <label for="Enter your message">Enter your message</label>
		    <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter your message','name'=>'key', 'value'=>set_value("key")]); ?> 
		  </div>
		  <?php echo form_error('key'); ?>
		 	<?php echo form_submit(['class'=>'btn btn-success','value'=>'Encode']); ?> 
			<?php echo form_close(); ?>
		</div>
	</div>


<?php if(isset($decrypt_value) && ($decrypt_value != NULL)) 
{
	echo "<br><br><h4>Decrypted Message</h4>";
	echo "<br><h2>".$decrypt_value."</h2><br>";
}
?>


<br><br><br><br>
<?php if(isset($encrypt_value) && ($encrypt_value != NULL)) {?>
<div class="row">
		<div class="col-md-6">
			<h3>Decryption in codeigniter</h3>
		<?php echo "<div class='error_msg'>";
			echo "</div>"; ?>
			<?php echo form_open('encryption/key_decoder'); ?>
		  <div class="form-group">
		    <label for="Enter your message">Your message</label>
		    <?php echo form_input(['class'=>'form-control','placeholder'=>'Your message','name'=>'encrypt_key', 'value'=>$encrypt_value]); ?> 
		  </div>
		  <?php echo form_error('key'); ?>
		 	<?php echo form_submit(['class'=>'btn btn-success','value'=>'Decode']); ?> 
			<?php echo form_close(); ?>
		</div>
	</div>
<?php } ?>

</div>
<?php include_once('footer.php'); ?>
