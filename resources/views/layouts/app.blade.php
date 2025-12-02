<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>@yield('title')</title>


<style>
    body {
        margin: 0;
        padding: 20px;
        font-family: "Poppins", sans-serif;
        background: #f0f2f5;
    }

    h2 {
        text-align: center;
        color: #444;
        margin-bottom: 25px;
    }

    /* Buttons */
    .btn {
        padding: 10px 16px;
        background: #6a5acd;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        margin: 0 8px;
        transition: 0.3s;
    }
    .btn:hover { background: #yellow; }

    /* Card / Form Container */
    .card {
        background: #fff;
        width: 450px;
        margin: auto;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    /* Labels & Inputs */
    label {
        font-weight: 600;
        margin-top: 10px;
        display: block;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="file"] {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
        transition: 0.3s;
        font-size: 15px;
    }
    input:focus {
        border-color: #6a5acd;
        outline: none;
        box-shadow: 0 0 5px rgba(106, 90, 205, 0.4);
    }

    /* Submit Button */
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
        margin-top: 10px;
    }
    button:hover {
        background: cyan;
    }

    /* Table */
    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        margin-top: 20px;
    }
    th, td {
        padding: 14px;
        text-align: center;
        border-bottom: 1px solid #eee;
    }
    th {
        background: #F08080;
        color: white;
        font-weight: 400;
    }
    tr:hover { background: #f8f7ff; }

    

.action-btn {
  padding: 8px 10px;      /* medium size */
  font-size: 15px;        /* medium text */
  border: none;
  border-radius: 6px;
  cursor: pointer;
}





    .edit-btn { background: #008080; color: white; }
    .edit-btn:hover { background: #008080; }
    .delete-btn { background: #800080; color: white; }
    .delete-btn:hover { background: #800080; }

    .profile-img {
        border-radius: 8px;
        width: 55px;
        height: 55px;
        object-fit: cover;
    }

</style>
</head>

<body>

@yield('content')

</body>
</html>