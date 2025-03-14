@extends('adminlte::page')

@section('title', 'ZooPlus Dashboard -  Panel administracyjny')

@section('content')

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Subcampaigns</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/subcampaigns/create') }}" class="btn btn-success btn-sm" title="Add New Subcampaign">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/subcampaigns') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th scope="col" class="px-6 py-3">Subcampaign Name</th><th scope="col" class="px-6 py-3">Order Number</th><th scope="col" class="px-6 py-3">Quantity</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($subcampaigns as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">{{ $item->subcampaign_name }}</td><td class="px-6 py-4">{{ $item->order_number }}</td><td class="px-6 py-4">{{ $item->quantity }}</td>
                                        <td>
                                            <a href="{{ url('/admin/subcampaigns/' . $item->id) }}" title="View Subcampaign"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/subcampaigns/' . $item->id . '/edit') }}" title="Edit Subcampaign"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/subcampaigns' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Subcampaign" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $subcampaigns->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

