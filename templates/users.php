<?php include('header.php') ?>
	
	<h2>Users</h2>

	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Email</th>
				<th>Name</th>
				<th>Active</th>
				<th>Created at</th>
				<th>Updated at</th>
				<th>Edit</th>
			</tr>
		</thead>
		<tbody>

		<?php foreach( $data['users'] as $user) : ?>
			<tr>
				<td><?= $user->id ?></td>
				<td><?= $user->email ?></td>
				<td><?= $user->name ?></td>
				<td><?= $user->active ?></td>
				<td><?= $user->created_at ?></td>
				<td><?= $user->updated_at ?></td>
				<td><a href="/admin/users/edit/<?= $user->id ?>">Edit</a></td>
			</tr>			
		<?php endforeach; ?>

		</tbody>
	</table>

<?php include('footer.php') ?>

