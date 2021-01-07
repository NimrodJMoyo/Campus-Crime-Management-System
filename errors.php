<?php  if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo "<input autofocus type='radio'>".$error; ?></p>
			
		<?php endforeach ?>
	</div>
<?php  endif ?>
