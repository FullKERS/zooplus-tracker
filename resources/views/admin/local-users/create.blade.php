@extends('adminlte::page')

@section('title', 'ZooPlus Dashboard - Panel administracyjny')

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
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" name="login" required>
            </div>

            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
            </div>

            <div class="form-group">
                <label for="email">Email (used for contact)</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password (min 8 characters)</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="language">Language</label>
                <input type="text" class="form-control" id="language" name="language">
            </div>

            <div class="form-group">
                <label for="theme">Theme</label>
                <input type="text" class="form-control" id="theme" name="theme">
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" name="role" id="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="hidden" name="hidden">
                <label class="form-check-label" for="hidden">Hidden</label>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="disabled" name="disabled">
                <label class="form-check-label" for="disabled">Disabled</label>
            </div>

            <div class="form-group">
                <label for="pwdExpiration">Password Expiration</label>
                <input type="date" class="form-control" id="pwdExpiration" name="pwdExpiration">
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
