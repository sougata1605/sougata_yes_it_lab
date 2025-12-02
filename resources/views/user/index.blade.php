@extends('layouts.app')

@section('title', 'User List')

@section('content')



<h2>User List</h2>

<div style="text-align:center; margin-bottom:20px;">
    <a class="btn" href="{{ route('user.create') }}">Add User</a>
    <a class="btn" href="{{ route('user.export.csv') }}">Export CSV</a>

      <a class="btn" href="{{ route('audio.index') }}"> Audio file length  </a>
    <a class="btn" href="{{ route('user.export.csv') }}">Calculate distance</a>
</div>

<table>
    <tr>
        <th style="width: 50px;">UID</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Picture</th>
        <th>Action</th>
    </tr>
 @php $i = 1; @endphp

    @foreach($users as $u)


    <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>{{ $u->mobile }}</td>

        <td>
            @if($u->profile_pic)
                <img src="/storage/{{ $u->profile_pic }}" class="profile-img" width="80">
            @else
                No Image
            @endif
        </td>

        <td>

    <a href="{{ route('user.edit', $u->id) }}">
        <button class="action-btn edit-btn" type="button" style="width: 60px;">
            Edit
        </button>
    </a>

    <form action="{{ route('user.destroy', $u->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button class="action-btn delete-btn" type="submit">
            Delete
        </button>
    </form>

</td>
    </tr>
    @endforeach

</table>

@endsection


