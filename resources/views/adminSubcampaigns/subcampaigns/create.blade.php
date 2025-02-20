@extends('adminlte::page')

@section('title', 'ZooPlus Tracker - Panel administracyjny')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">Dodajesz podkampanie do kampanii: {{ $campaign->campaign_name ?? 'Nieznana kampania' }}
        </div>

        <div class="card-body">
            <a href="{{ url('/admin/campaigns/'.$campaign->id) }}" class="btn btn-warning btn-sm"><i
                    class="fa fa-arrow-left"></i> Back</a>
            <br /><br />

            @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ url('/admin/subcampaigns') }}" class="form-horizontal"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="campaign_id" value="{{ $campaign_id }}">

                <table class="table table-bordered" id="subcampaignsTable">
                    <thead>
                        <tr>
                            <th>Subcampaign Name</th>
                            <th>Country</th>
                            <th>Order Number</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-control" name="subcampaigns[0][subcampaign_name]" type="text"></td>
                            <td>
                                <select class="form-control" name="subcampaigns[0][country_id]">
                                    <option value="">Wybierz kraj</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->flag_image }} {{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input class="form-control" name="subcampaigns[0][order_number]" type="text"></td>
                            <td><input class="form-control" name="subcampaigns[0][quantity]" type="number"></td>
                            <td><input class="form-control" name="subcampaigns[0][status]" type="text"></td>
                            <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                        </tr>
                    </tbody>
                </table>

                <button type="button" class="btn btn-success" id="addRow">Add Subcampaign</button>
                <br /><br />
                <button type="submit" class="btn btn-primary">Save Subcampaigns</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
let rowIndex = 1;
document.getElementById('addRow').addEventListener('click', function() {
    const table = document.getElementById('subcampaignsTable').querySelector('tbody');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td><input class="form-control" name="subcampaigns[\${rowIndex}][subcampaign_name]" type="text"></td>
        <td>
            <select class="form-control" name="subcampaigns[\${rowIndex}][country_id]">
                <option value="">Wybierz kraj</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->flag_image }} {{ $country->name }}</option>
                @endforeach
            </select>
        </td>
        <td><input class="form-control" name="subcampaigns[\${rowIndex}][order_number]" type="text"></td>
        <td><input class="form-control" name="subcampaigns[\${rowIndex}][quantity]" type="number"></td>
        <td><input class="form-control" name="subcampaigns[\${rowIndex}][status]" type="text"></td>
        <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
    `;
    table.appendChild(newRow);
    rowIndex++;
});

document.addEventListener('click', function(event) {
    if (event.target.classList.contains('remove-row')) {
        event.target.closest('tr').remove();
    }
});
</script>
@endsection