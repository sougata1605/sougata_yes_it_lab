@extends('layouts.app')

@section('title', 'Create User')

@section('content')
<div class="card">
    <h2>Create User</h2>

    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Mobile</label>
        <input type="text" name="mobile" maxlength="10" minlength="10" required>

        <label>Profile Picture</label>
        <input type="file" name="profile_pic">

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Save</button>
    </form>

    <div style="text-align:center; margin-top:15px;">
        <a href="{{ route('user.index') }}" class="btn">← Back</a>
    </div>
</div>
@endsection