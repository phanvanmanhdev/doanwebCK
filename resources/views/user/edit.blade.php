@extends('dashboard')
  
@section('title', 'Edit User')
  
@section('right-content')
    <h2 class="mb-0">Edit User</h2>
    <hr />
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Title" value="{{ $user->name }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Price" value="{{ $user->email }}" >
            </div>
        </div>
        
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection