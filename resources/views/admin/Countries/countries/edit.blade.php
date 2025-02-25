@extends('adminlte::page')

@section('title', 'ZooPlus Dashboard -  Panel administracyjny')

@section('content')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Country #{{ $country->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/countries') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/countries/' . $country->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin/Countries.countries.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

