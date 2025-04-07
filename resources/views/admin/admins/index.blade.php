<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Manage Admins</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.admins.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <input type="text" name="username" class="form-control" placeholder="Username/Email" required>
                </div>
                <div class="col-md-5">
                    <select name="type" class="form-control" required>
                        <option value="seeddms">SeedDMS User</option>
                        <option value="local">Local User</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Add Admin</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->username }}</td>
                    <td>{{ ucfirst($admin->type) }}</td>
                    <td>
                        <form action="{{ route('admin.admins.destroy', $admin) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>