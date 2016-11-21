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

	<nav class="navbar navbar-dark bg-primary mb-2">
		<div class="container">

			<a class="navbar-brand" href="/admin/dashboard">Slim Starter Pack</a>
				
				<ul class="nav navbar-nav float-sm-right">
					<li class="nav-item">
						<a class="nav-link" href="/admin/dashboard">Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/admin/users">Users</a>
					</li>
					<li class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Info</a>

						<div class="dropdown-menu">
							<a class="dropdown-item" target="_blank" href="http://www.andrearufo.it/">andrearufo.it</a>
								<a class="dropdown-item" target="_blank" href="https://github.com/andrearufo/slim-starter-pack">GIT Repository</a>
								<a class="dropdown-item" target="_blank" href="https://www.slimframework.com/">Slim Framework</a>
							</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/admin/logout">Logout</a>
					</li>
				</ul>
			
		</div>
	</nav>

	<div class="container">

		<?php if( isset($data['messages']) ) : foreach( $data['messages'] as $status => $messages ) : ?>
			<div class="alert alert-<?= $status ?>">
				
				<?php foreach( $messages as $m ) : ?>
					<span><?php echo $m ?></span>
				<?php endforeach; ?>

			</div>
		<?php endforeach; endif; ?>