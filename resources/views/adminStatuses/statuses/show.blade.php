@extends('adminlte::page')

@section('title', 'ZooPlus Dashboard -  Panel administracyjny')

@section('content')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Status {{ $status->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/statuses') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/statuses/' . $status->id . '/edit') }}" title="Edit Status"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/statuses' . '/' . $status->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Status" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $status->id }}</td>
                                    </tr>
                                    <tr><td class="border px-8 py-4 font-bold"> Status Name </td><td class="border px-8 py-4"> {{ $status->status_name }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Status Description </td><td class="border px-8 py-4"> {{ $status->status_description }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Order </td><td class="border px-8 py-4"> {{ $status->order }} </td></tr>
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

