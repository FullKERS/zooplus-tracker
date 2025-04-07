@extends('adminlte::page')

@section('title', 'ZooPlus Dashboard -  Panel administracyjny')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add New Local User</h3>
    </div>
    <form method="POST" action="{{ route('admin.local-users.store') }}">
        @csrf
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" 
                       placeholder="Enter full name" required>
            </div>

            <div class="form-group">
                <label for="email">Login</label>
                <input type="email" class="form-control" id="email" name="email" 
                       placeholder="Enter login" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" 
                       placeholder="Password (min 8 characters)" required>
            </div>

            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="is_admin" name="is_admin">
                    <label class="custom-control-label" for="is_admin">Administrator Access</label>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Create User
            </button>
            <a href="{{ route('admin.local-users.index') }}" class="btn btn-default">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection