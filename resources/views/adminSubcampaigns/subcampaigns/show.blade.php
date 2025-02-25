@extends('adminlte::page')

@section('title', 'ZooPlus Dashboard -  Panel administracyjny')

@section('content')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Subcampaign {{ $subcampaign->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/campaigns/'.$subcampaign->campaign->id) }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/subcampaigns/' . $subcampaign->id . '/edit') }}" title="Edit Subcampaign"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/subcampaigns' . '/' . $subcampaign->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Subcampaign" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $subcampaign->id }}</td>
                                    </tr>
                                    <tr><td class="border px-8 py-4 font-bold"> Subcampaign Name </td><td class="border px-8 py-4"> {{ $subcampaign->subcampaign_name }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Order Number </td><td class="border px-8 py-4"> {{ $subcampaign->order_number }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Quantity </td><td class="border px-8 py-4"> {{ $subcampaign->quantity }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

