@extends('adminlte::page')

@section('title', 'PGX Obwoluty - Panel administracyjny')

@section('content')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Campaign {{ $campaign->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/campaigns') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/campaigns/' . $campaign->id . '/edit') }}" title="Edit Campaign"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/campaigns' . '/' . $campaign->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Campaign" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $campaign->id }}</td>
                                    </tr>
                                    <tr><td class="border px-8 py-4 font-bold"> Campaign Name </td><td class="border px-8 py-4"> {{ $campaign->campaign_name }} </td></tr>
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

