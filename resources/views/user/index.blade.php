@extends('dashboard')

@section('title', 'List User')

@section('right-content')
<div class="col-lg-9">
    <!-- Nội dung trang danh sách người dùng -->
    <h1 class="mb-0">List User</h1>
    <a href="{{ route('user.create') }}" class="btn btn-primary">Add User</a>
    <hr />
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th> 
            </tr>
        </thead>
        
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic exemple">
                <a href="{{ route('user.edit', ['id' => $user->id]) }}"type="button" class="btn btn-warning">Edit</a>

                <form action="{{ route('user.destroy', $user->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
