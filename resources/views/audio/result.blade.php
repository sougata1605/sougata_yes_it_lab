
@extends('layouts.app')

@section('title', 'User List')

@section('content')



<h2>Audio File Duration</h2>

<p><strong>File:</strong> {{ $filename }}</p>



@if(isset($error))
    <p style="color:red">Error: {{ $error }}</p>
@else
    <p>Play Time: {{ $duration }}</p>
@endif






<a  class="btn" href="{{ route('audio.index') }}">Upload Another File</a>
<a class="btn" href="{{ route('user.create') }}">Add User</a>


