@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="card">
    <h2>Edit User</h2>

    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Name</label>
        <input type="text" name="name" value="{{ $user->name }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}" required>

        <label>Mobile</label>
        <input type="text" name="mobile" maxlength="10" minlength="10" value="{{ $user->mobile }}" required>

        <label>Profile Picture</label>
        <input type="file" name="profile_pic">

        @if($user->profile_pic)
        <div class="image-preview">
            <img src="/storage/{{ $user->profile_pic }}" alt="Current Image" width="80">
            <p>Current Profile Picture</p>
        </div>
        @endif

        <label>Password (Optional)</label>
        <input type="password" name="password" placeholder="Enter only if changing">

        <button type="submit">Update</button>
        <br>
        <br>
        <br>

        <div style="text-align:center; margin-top:10px;">
            <a href="{{ route('user.index') }}" class="btn">← Back</a>
        </div>
    </form>
</div>
@endsection