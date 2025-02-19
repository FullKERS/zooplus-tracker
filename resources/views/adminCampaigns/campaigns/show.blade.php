@extends('adminlte::page')

@section('title', 'PGX Obwoluty - Panel administracyjny')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Campaign: {{ $campaign->campaign_name }}</h3>
        </div>
        <div class="card-body">
            <a href="{{ url('/admin/campaigns') }}" class="btn btn-warning btn-sm">
                <i class="fa fa-arrow-left"></i> Back
            </a>
            <a href="{{ url('/admin/campaigns/' . $campaign->id . '/edit') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-pencil-square-o"></i> Edit
            </a>
            <form method="POST" action="{{ url('admin/campaigns/' . $campaign->id) }}" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirm delete?')">
                    <i class="fa fa-trash-o"></i> Delete
                </button>
            </form>
            <br /><br />
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $campaign->id }}</td>
                        </tr>
                        <tr>
                            <th>Campaign Name</th>
                            <td>{{ $campaign->campaign_name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h3>Subcampaigns</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Order Number</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($campaign->subcampaigns as $subcampaign)
                    <tr>
                        <td>{{ $subcampaign->id }}</td>
                        <td>{{ $subcampaign->subcampaign_name }}</td>
                        <td>{{ $subcampaign->order_number }}</td>
                        <td>{{ $subcampaign->quantity }}</td>
                        <td>
                            <span
                                class="badge {{ $subcampaign->status == 'active' ? 'badge-success' : 'badge-secondary' }}">
                                {{ ucfirst($subcampaign->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ url('/admin/subcampaigns/' . $subcampaign->id) }}" class="btn btn-sm btn-info"
                                title="View Subcampaign">
                                <i class="fa fa-eye" aria-hidden="true"></i> View
                            </a>
                            <a href="{{ url('/admin/subcampaigns/' . $subcampaign->id . '/edit') }}"
                                class="btn btn-sm btn-primary" title="Edit Subcampaign">
                                <i class="fa fa-pencil"></i> Edit
                            </a>

                            <form method="POST" action="{{ url('/admin/subcampaigns/' . $subcampaign->id) }}"
                                accept-charset="UTF-8" style="display:inline"
                                onsubmit="return confirm('Confirm delete?')">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete Subcampaign">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop