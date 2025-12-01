<!DOCTYPE html>
<html>
<body>
<h2>Create User</h2>
<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
@csrf
Name: <input type="text" name="name"><br>
Email: <input type="email" name="email"><br>
Mobile: <input type="text" name="mobile"><br>
Pic: <input type="file" name="profile_pic"><br>
Password: <input type="password" name="password"><br>
<button type="submit">Save</button>
</form>
</body>
</html>