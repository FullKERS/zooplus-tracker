@extends('adminlte::page')

@section('title', 'ZooPlus Dashboard - Panel administracyjny')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Local Users List</h3>
        <div class="card-tools">
            <a href="{{ route('admin.local-users.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Create New
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th>Login</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th style="width: 20%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->login }}</td>
                    <td>{{ $user->fullName }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge {{ $user->role === 'admin' ? 'bg-success' : 'bg-info' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td>
                        @if($user->disabled)
                        <span class="badge bg-danger">Disabled</span>
                        @else
                        <span class="badge bg-success">Active</span>
                        @endif
                    </td>
                    <td class="text-center">
                        {{-- przyciski edycji/usuwania (do wdrożenia w razie potrzeby) --}}
                        <a href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="#" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection