<table class="table table-bordered">
	<th>id</th>
	<th>name</th>
	<th>email</th>
	<th>phone</th>
	<th>city</th>
	<th>Actions</th>
	<tbody>
	@foreach($users as $user)

		<tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->phone }}</td>
			<td>{{ $user->city }}</td>
			<td>
				<a class="btn btn-info edit_button" user="{{ json_encode($user)}}">Edit</a>
				<a class="btn btn-danger" id="userDelete" user="{{ json_encode($user)}}">Delete</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>