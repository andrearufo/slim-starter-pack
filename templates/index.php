<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Danimio</title>

</head>
<body>
	
	<div class="container"><div class="row"><div class="col-sm-6 offset-sm-3">

		<div class="py-3 text-xs-center">

			<p class="display-4">Slim Starter Pack</p>
			<p class="lead">A starter pack based on Slim Framework and some other stuff</p>

		</div>
	
		<?php if( isset($data['messages']) ) : foreach( $data['messages'] as $status => $messages ) : ?>
			<div class="alert alert-<?= $status ?>">
				
				<?php foreach( $messages as $m ) : ?>
					<span><?php echo $m ?></span>
				<?php endforeach; ?>

			</div>
		<?php endforeach; endif; ?>

		<div class="card card-block">
			<form method="post" action="/login">

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
					<button class="btn btn-block btn-primary">Loggin</button>
				</div>

			</form>
		</div>

		<div class="card card-block">
			Dafault username: <code>admin@slimstarterpack.ltd</code><br>
			Default password <code>slimstarterpack</code>
		</div>

	</div></div></div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"></script>

</body>
</html>