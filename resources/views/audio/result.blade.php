
@extends('layouts.app')

@section('title', 'User List')

@section('content')

<div class="card">
    <h2>Audio File Duration</h2>

    <p><strong>File:</strong> {{ $filename }}</p>

    @if(isset($error))
        <p class="error">Error: {{ $error }}</p>
    @else
        <p><strong>Play Time:</strong> {{ $duration }}</p>
    @endif

    <a class="btn" href="{{ route('audio.index') }}">Upload Another File</a>
    <a class="btn btn-secondary" href="{{ route('user.index') }}">User List</a>
</div>



