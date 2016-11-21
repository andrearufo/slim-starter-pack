<?php include('header.php') ?>
	
	<h2>Login</h2>
	
	<?php if( isset($data['messages']) ) : foreach( $data['messages'] as $status => $messages ) : ?>
		<div class="alert alert-<?= $status ?>">
	    	
	    	<?php foreach( $messages as $m ) : ?>
				<span><?php echo $m ?></span>
	    	<?php endforeach; ?>

    	</div>
	<?php endforeach; endif; ?>

	<div class="card card-block">
		<form method="post">

			<input type="hidden" name="<?php echo $data['csrf']['nameKey'] ?>" value="<?php echo $data['csrf']['name'] ?>">
	   		<input type="hidden" name="<?php echo $data['csrf']['valueKey'] ?>" value="<?php echo $data['csrf']['value'] ?>">

			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" required>
			</div>

			<div class="form-group">
				<button class="btn btn-block btn-primary">Accedi</button>
			</div>

		</form>
	</div>

	<div class="card card-block">
		Userna: <code>admin@danimio.com</code> Password <code>danimio</code>
	</div>

<?php include('footer.php') ?>