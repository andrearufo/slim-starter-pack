<?php include('header.php') ?>

	<?php

		if( isset($data['user']) ){
		
			$user = $data['user'];
			$action = '/admin/users/update/'.$user->id;
			$title = 'Edit utente';
		
		}else{

			$user = null;
			$action = '/admin/users/save';
			$title = 'Add utente';
		}

	?>
	
	<h2><?= $title ?></h2>

	<div class="card card-block">
		<form method="post" action="<?= $action ?>">

			<input type="hidden" name="<?= $data['csrf']['nameKey'] ?>" value="<?= $data['csrf']['name'] ?>">
			<input type="hidden" name="<?= $data['csrf']['valueKey'] ?>" value="<?= $data['csrf']['value'] ?>">

			<div class="form-group">
				<label for="email">Email address</label>
				<input type="email" name="email" class="form-control" required value="<?= ($user) ? $user->email : ''; ?>">
				<small class="form-text text-muted">Used al username for login</small>
			</div>

			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" value="<?= ($user) ? $user->name : ''; ?>">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" <?= ($user) ? '' : 'required'; ?>>
				<small class="form-text text-warning">Leave blank for no changes</small>
			</div>

			<div class="form-group">
				<label class="form-check-inline">
				  	<input class="form-check-input" type="radio" name="active" 
				  		value="1" <?= ($user && $user->active) ? 'checked' : '' ?>
				  	> Active
				</label>
				<label class="form-check-inline">
				  	<input class="form-check-input" type="radio" name="active" 
				  		value="0" <?= ($user && !$user->active) ? 'checked' : '' ?>
				  	> Unactive
				</label>
			</div>

			<button class="btn btn-block btn-primary">Save</button>

		</form>
	</div>

<?php include('footer.php') ?>