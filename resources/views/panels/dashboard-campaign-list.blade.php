<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Campaign List</h3>


    </div>
    <div class="card-body">

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><i class="fa-solid fa-envelope"></i> Campaign name</th>
                    <th><i class="fa-solid fa-bars-staggered"></i> Order number</th>
                    <th><i class="fa-solid fa-calendar-days"></i> Date of admission</th>
                    <th><i class="fa-solid fa-calendar-days"></i> End date</th>
                    <th><i class="fa-solid fa-percent"></i> Progress</th>
                    <th><i class="fa-solid fa-copy"></i> Number of versions</th>
                    <th><i class="fa-solid fa-clipboard-question"></i> Status</th>
                </tr>
            </thead>
            <tbody>

                @foreach($campaignes as $campaign)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i>
                        {{ $campaign->campaign_name }}
                    </td>
                    <td>{{ $campaign->orderNumbers }}</td>
                    <td>01.01.2024</td>
                    <td>15.01.2024</td>
                    <td>
                        <div class="progress progress-xs">
                            <div class="pprogress-bar bg-success" style="width: {{ $campaign->campaign_progress }}%">
                            </div>
                        </div>
                    </td>
                    <td>{{ $campaign->subcampaignsCount }}</td>
                    <td>
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
                                    <th><i class="fa-solid fa-envelope"></i> Sub-campaign name</th>
                                    <th><i class="fa-solid fa-bars-staggered"></i> Order number</th>
                                    <th><i class="fa-solid fa-copy"></i> Quantity</th>
                                    <th><i class="fa-solid fa-percent"></i> Progress</th>
                                    <th><i class="fa-solid fa-clipboard-question"></i>
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
                                    <td>{{ $subcampaign->order_number }}</td>
                                    <td>{{ $subcampaign->quantity }}</td>
                                    <td>
                                        <div class="progress progress-xs" style="position: relative;">
                                            <div class="progress-bar bg-success" style="width: {{ $subcampaign->progress }}%;">
                                                <span class="progress-text" style="position: absolute; width: 100%; text-align: center; color: #fff; top: 50%; transform: translateY(-50%);">
                                                    {{ $subcampaign->progress }}%
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $subcampaign->status_txt === 'Completed' ? 'badge-success' : 'badge-warning' }}">
                                            {{ $subcampaign->status_txt }}
                                        </span>
                                    </td>
                                </tr>
                                <tr class="expandable-body">
                                    <td colspan="5">

                                        <div class="subcampaign-details">
                                            <div class="subcampaign-info">
                                                <p><strong>Quantity:</strong> {{ $subcampaign->quantity }} pcs.
                                                </p>
                                            </div>

                                            <div class="line_box timeline_process" style="margin: 40px 0;">
                                                @foreach ($subcampaign->statuses as $status )
                                                <div class="text_circle done">
                                                    <div class="circle">
                                                        <h4>{{ $status->status->status_name }}</h4>
                                                        <p>{{ \Carbon\Carbon::parse($status->status_date)->isPast() ? \Carbon\Carbon::parse($status->status_date)->format('Y-m-d') : '' }}
                                                        </p>
                                                    </div>
                                                    <a href="javascript:void(0)" class="tvar"><span
                                                            data-toggle="popover" title="Info" data-trigger="hover"
                                                            data-placement="top"
                                                            data-content="{{ $status->status->status_description }}">i</span></a>
                                                </div>
                                                @endforeach
                                            </div>

                                            <script>
                                            $(function() {
                                                $('[data-toggle="popover"]')
                                                    .popover();
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