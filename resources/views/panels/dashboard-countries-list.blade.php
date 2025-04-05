<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-globe-europe mr-2"></i>Shipped by country</h3>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width: 10%">No.</th>
                        <th>Country</th>
                        <th class="text-right">Total Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(App\Models\Statistic::countriesQuantities() as $country)
                    @if($country['total_quantity'] > 0)
                    <tr>
                        <td>
                            {{ $country['lp'] }}
                        </td>
                        <td>
                            @if($country['flag'])
                            {{ $country['flag'] }}
                            @else
                            <i class="fas fa-flag text-muted"></i>
                            @endif
                            {{ $country['name'] }} ({{ $country['iso_code'] }})
                        </td>
                        <td class="text-right">
                            {{ number_format($country['total_quantity'], 0, ',', ' ') }} pcs
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>