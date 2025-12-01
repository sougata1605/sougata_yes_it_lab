<!DOCTYPE html>
<html>
<body>
<h2>Edit User</h2>
<form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')
Name: <input type="text" name="name" value="{{ $user->name }}"><br>
Email: <input type="email" name="email" value="{{ $user->email }}"><br>
Mobile: <input type="text" name="mobile" value="{{ $user->mobile }}"><br>
Pic: <input type="file" name="profile_pic"><br>
@if($user->profile_pic)<img src="/storage/{{ $user->profile_pic }}" width="50">@endif<br>
<button type="submit">Update</button>
</form>
</body>
</html>