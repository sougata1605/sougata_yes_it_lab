<!DOCTYPE html>
<html>
<body>
<h2>User List</h2>
<a href="{{ route('user.create') }}">Add User</a>
<a href="{{ route('user.export.csv') }}">Export CSV</a>
<table border="1">
<tr>
<th>ID</th><th>Name</th><th>Email</th><th>Mobile</th><th>Pic</th><th>Action</th>
</tr>
@foreach($users as $u)
<tr>
<td>{{ $u->id }}</td>
<td>{{ $u->name }}</td>
<td>{{ $u->email }}</td>
<td>{{ $u->mobile }}</td>
<td>@if($u->profile_pic)<img src="/storage/app/public/profiles/{{ $u->profile_pic }}" width="50">@endif</td>
<td><a href="{{ route('user.edit',$u->id) }}">Edit</a> |
<form action="{{ route('user.destroy',$u->id) }}" method="POST" style="display:inline-block;">
@csrf @method('DELETE')
<button type="submit">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
</body>
</html>


