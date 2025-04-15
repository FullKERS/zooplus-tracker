@extends('adminlte::page')

@section('title', 'ZooPlus Dashboard - Edycja użytkownika')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Local User</h3>
    </div>
    <form method="POST" action="{{ route('admin.local-users.update', $localUser->id) }}">
        @csrf
        @method('PUT')
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
                <input type="text" class="form-control" id="login" name="login" value="{{ old('login', $localUser->login) }}" required>
            </div>

            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" value="{{ old('fullName', $localUser->fullName) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email (used for contact)</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $localUser->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password (leave blank to keep current)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="language">Language</label>
                <input type="text" class="form-control" id="language" name="language" value="{{ old('language', $localUser->language) }}">
            </div>

            <div class="form-group">
                <label for="theme">Theme</label>
                <input type="text" class="form-control" id="theme" name="theme" value="{{ old('theme', $localUser->theme) }}">
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" name="role" id="role" required>
                    <option value="user" @selected($localUser->role === 'user')>User</option>
                    <option value="admin" @selected($localUser->role === 'admin')>Admin</option>
                </select>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="hidden" name="hidden" @checked($localUser->hidden)>
                <label class="form-check-label" for="hidden">Hidden</label>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="disabled" name="disabled" @checked($localUser->disabled)>
                <label class="form-check-label" for="disabled">Disabled</label>
            </div>

            <div class="form-group">
                <label for="pwdExpiration">Password Expiration</label>
                <input type="date" class="form-control" id="pwdExpiration" name="pwdExpiration"
                       value="{{ old('pwdExpiration', optional($localUser->pwdExpiration)->format('Y-m-d')) }}">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Changes
            </button>
            <a href="{{ route('admin.local-users.index') }}" class="btn btn-default">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
