<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Create User</title>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        background: #f0f2f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .card {
        background: #fff;
        width: 450px;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        animation: fadeIn 0.6s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0px); }
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #444;
    }

    .form-group {
        margin-bottom: 15px;
        width: 100%;
    }

    label {
        font-weight: 600;
        color: #333;
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="file"] {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        transition: 0.3s;
        font-size: 15px;
    }

    input:focus {
        border-color: #6a5acd;
        outline: none;
        box-shadow: 0 0 5px rgba(106, 90, 205, 0.4);
    }

    button {
        width: 100%;
        padding: 12px;
        background: #6a5acd;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background: #5947db;
    }

    .back-link {
        text-align: center;
        margin-top: 15px;
    }

    .back-link a {
        text-decoration: none;
        color: #6a5acd;
        font-weight: 600;
        transition: 0.3s;
    }

    .back-link a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>

<div class="card">
    <h2>Create User</h2>

    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Mobile</label>
            <input type="text" name="mobile" maxlength="10" minlength="10" required>
        </div>

        <div class="form-group">
            <label>Profile Picture</label>
            <input type="file" name="profile_pic" accept="image/*">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Save</button>
    </form>

    <div class="back-link">
        <a href="{{ route('user.index') }}">← Back to User List</a>
    </div>
</div>

</body>
</html>