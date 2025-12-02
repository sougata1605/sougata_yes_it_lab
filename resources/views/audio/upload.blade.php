@extends('layouts.app')

@section('title', 'User List')

@section('content')

<h2>Upload Audio to Get Play Time</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('audio.length') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Choose Audio File:</label>
    <input type="file" name="audio" required>
    <br><br>

    <button type="submit">Get Duration</button>
</form>


    


