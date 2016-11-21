<?php include('header.php') ?>
	
	<h2>Edit user</h2>

	<?php echo '<pre>'.print_r($data, 1).'</pre>'; ?>

	<form>
		<div class="form-group">
			<label for="name">name</label>
			<input type="text" name="name" class="form-control" placeholder="name" value="name" required>
			<small class="form-text text-muted">name</small>
		</div>

		<button type="submit" class="btn btn-primary btn-block">Save</button>
	</form>

<?php include('footer.php') ?>

