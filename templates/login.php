<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Slim Starter Pack</title>

</head>
<body>
	
	<div class="container">
		<div class="py-3 text-xs-center">

			<p class="display-4">Login</p>
			<p class="lead">The access page to the admin sections</p>

			<ul class="list-inline">
				<li class="list-inline-item">
					<a href="/">Home</a>
				</li>
				<li class="list-inline-item">
					<a href="https://github.com/andrearufo/slim-starter-pack">GitHub</a>
				</li>
			</ul>

		</div>

		<div class="py-3">
			
			<?php if( isset($data['messages']) ) : foreach( $data['messages'] as $status => $messages ) : ?>
				<div class="alert alert-<?= $status ?>">
			    	
			    	<?php foreach( $messages as $m ) : ?>
						<span><?php echo $m ?></span>
			    	<?php endforeach; ?>

		    	</div>
			<?php endforeach; endif; ?>

			<div class="card card-block">
				<form method="post" action="/access">

					<input 
						type="hidden" 
						name="<?php echo $data['csrf']['nameKey'] ?>" 
						value="<?php echo $data['csrf']['name'] ?>"
					>
			   		<input 
			   			type="hidden" 
			   			name="<?php echo $data['csrf']['valueKey'] ?>" 
			   			value="<?php echo $data['csrf']['value'] ?>"
			   		>
					
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control" required>
						</div>

						<div class="form-group col-sm-6">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<button class="btn btn-block btn-primary">Accedi</button>
					</div>

				</form>
			</div>

			<div class="card card-block">
				Username: <code>admin@slimstarterpack.ltd</code> <br>
				Password <code>slimstarterpack</code>
			</div>

		</div>
	</div>

</body>
</html>