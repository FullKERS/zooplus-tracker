<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Campaign List</h3>


    </div>
    <div class="card-body">

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="td-min-40"><i class="fa-solid fa-envelope"></i> Campaign name</th>
                    <th class="td-center"><i class="fa-solid fa-bars-staggered"></i> PGX order number</th>
                    <th class="td-center"><i class="fa-solid fa-calendar-days"></i> Date of admission</th>
                    <th class="td-center"><i class="fa-solid fa-calendar-days"></i> End date</th>
                    <th class="td-center td-min-20"><i class="fa-solid fa-percent"></i> Progress</th>
                    <th class="td-center"><i class="fa-solid fa-copy"></i> Number of versions</th>
                    <th class="td-center"><i class="fa-solid fa-clipboard-question"></i> Status</th>
                </tr>
            </thead>
            <tbody>

                @foreach($campaignes as $campaign)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i>
                        {{ $campaign->campaign_name }}
                    </td>
                    <td class="td-center">{{ $campaign->orderNumbers }}</td>
                    <td class="td-center">01.01.2024</td>
                    <td class="td-center">15.01.2024</td>
                    <td class="td-center">
                        <div class="progress progress-xs" style="position: relative;">
                            <div class="progress-bar bg-success" style="width: {{ $campaign->campaign_progress }}%;">
                            </div>
                            <span class="progress-text">{{ $campaign->campaign_progress }}%</span>
                        </div>
                    </td>
                    <td class="td-center">{{ $campaign->subcampaignsCount }}</td>
                    <td class="td-center">
                        <span
                            class="badge {{ $campaign->status_txt === 'Completed' ? 'badge-success' : 'badge-warning' }}">
                            {{ $campaign->status_txt }}
                        </span>
                    </td>
                </tr>
                <tr class="expandable-body">
                    <td colspan="7">
                        <table class="table table-bordered table-hover sub-campaign-table">
                            <thead>
                                <tr>
                                    <th class="td-min-40"><i class="fa-solid fa-envelope"></i> Sub-campaign name</th>
                                    <th class="td-center"><i class="fa-solid fa-bars-staggered"></i> PGX order number</th>
                                    <th class="td-center"><i class="fa-solid fa-copy"></i> Quantity</th>
                                    <th class="td-center"><i class="fa-solid fa-calendar-days"></i> Estimated delivery time</th>
                                    <th class="td-center td-min-20"><i class="fa-solid fa-clipboard-question"></i>
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($campaign->subcampaigns as $subcampaign)
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>
                                        @if(isset($subcampaign->country->flag_image))
                                        {{ $subcampaign->country->flag_image }}
                                        @endif
                                        {{ $subcampaign->subcampaign_name }}
                                    </td>
                                    <td class="td-center">{{ $subcampaign->order_number }}</td>
                                    <td class="td-center">{{ number_format($subcampaign->quantity, 0, ',', ' ') }} pcs.</td>
                                    <td class="td-center">
                                        @php
                                        /*$deliveryStatus = $subcampaign->statuses->firstWhere('status.status_name',
                                        'Estimated delivery time');
                                        $deliveryDate = $deliveryStatus ?
                                        \Carbon\Carbon::parse($deliveryStatus->status_date)->format('Y-m-d') : 'TBC';*/
                                        $deliveryStatus = $subcampaign->statuses->firstWhere('status.status_name', 'Estimated delivery time');
                                        $shipmentDispatch = $subcampaign->statuses->firstWhere('status.status_name', 'Shipment dispatch');

                                        if ($deliveryStatus && (\Carbon\Carbon::parse($deliveryStatus->status_date)->isPast() || $shipmentDispatch)) {
                                            $deliveryDate = \Carbon\Carbon::parse($deliveryStatus->status_date)->format('Y-m-d');
                                        } else {
                                            $deliveryDate = 'TBC';
                                        }
                                        @endphp

                                        {{ $deliveryDate }}
                                    </td>
                                    <td class="td-center">
                                        <span
                                            class="badge {{ $subcampaign->status_txt === 'Completed' ? 'badge-success' : 'badge-warning' }}">
                                            {{ $subcampaign->status_txt }}
                                        </span>
                                    </td>
                                </tr>
                                <tr class="expandable-body">
                                    <td colspan="5">

                                        <div class="subcampaign-details">


                                            <div class="timeline-box">
                                                @foreach ($subcampaign->statuses as $index => $status)
                                                @php
                                                $statusDate = \Carbon\Carbon::parse($status->status_date);
                                                $isPast = $statusDate->isPast();
                                                @endphp

                                                <div class="status-box {{ $isPast ? '' : 'expected' }}"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="{{ $status->status->status_description }}">
                                                    <h4>{{ $status->status->status_name }}</h4>
                                                    <p>{{ $isPast ? $statusDate->format('Y-m-d') : 'Expected: '.$statusDate->format('Y-m-d')  }}
                                                    </p>
                                                </div>

                                                @if (!$loop->last)
                                                <span class="arrow">→</span>
                                                @endif
                                                @endforeach
                                            </div>

                                            <script>
                                            $(function() {
                                                $('[data-toggle="tooltip"]').tooltip();
                                            });
                                            </script>






                                            <div class="subcampaign-links">
                                                <button class="btn btn-primary"><i class="fa-solid fa-file"></i>
                                                    Campaign files</button>
                                                <button class="btn btn-secondary"><i class="fa-solid fa-check"></i>
                                                    Post documents</button>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>