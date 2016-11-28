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

	<header class="py-2 container">

		<ul class="list-inline">
			<li class="list-inline-item">
				<span class="lead">Slim Starter Pack</span>
			</li>
			<li class="list-inline-item">
				<a href="/admin/dashboard">Dashboard</a>
			</li>
			<li class="list-inline-item">
				<a href="/admin/users">Users</a>
			</li>
			<li class="list-inline-item">
				<a href="/admin/logout">Logout</a>
			</li>
		</ul>

		<hr>

	</header>

	<main class="container py-2">

		<?php if( isset($data['messages']) ) : foreach( $data['messages'] as $status => $messages ) : ?>
			<div class="alert alert-<?= $status ?>">
				
				<?php foreach( $messages as $m ) : ?>
					<span><?php echo $m ?></span>
				<?php endforeach; ?>

			</div>
		<?php endforeach; endif; ?>