@extends('adminlte::page')

@section('title', 'ZooPlus Dashboard -  Panel administracyjny')

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
                    <th style="width: 10%">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th style="width: 20%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->is_admin)
                            <span class="badge bg-success">Yes</span>
                        @else
                            <span class="badge bg-danger">No</span>
                        @endif
                    </td>
                    <td class="text-center">
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