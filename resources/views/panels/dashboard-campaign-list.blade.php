<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><i class="far fa-folder-open"></i> Active Campaigns</h3>
        <div class="card-tools">
            <div class="dataTables-controls" id="activeCampaigns_global_filter">
                <div class="input-group">
                    <input type="text" id="activeGlobalFilter" class="form-control" placeholder="Search all columns...">
                    <div class="input-group-append">
                        <button class="btn btn-default" id="activeResetFilters">
                            <i class="fa fa-undo"></i> Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover" id="activeCampaignsTable">
            <thead>
                <tr>
                    <th class="td-min-40 sortable" data-sort-key="campaign_name">
                        <i class="fa-solid fa-envelope"></i> Campaign name
                        <span class="sort-indicator"></span>
                    </th>
                    <th class="td-center sortable" data-sort-key="orderNumbers">
                        <i class="fa-solid fa-bars-staggered"></i> PGX order number
                        <span class="sort-indicator"></span>
                    </th>
                    <th class="td-center sortable" data-sort-key="date_admission">
                        <i class="fa-solid fa-calendar-days"></i> Date of admission
                        <span class="sort-indicator"></span>
                    </th>
                    <th class="td-center sortable" data-sort-key="end_date">
                        <i class="fa-solid fa-calendar-days"></i> End date
                        <span class="sort-indicator"></span>
                    </th>
                    <th class="td-center sortable" data-sort-key="campaign_progress">
                        <i class="fa-solid fa-percent"></i> Progress
                        <span class="sort-indicator"></span>
                    </th>
                    <th class="td-center sortable" data-sort-key="subcampaignsCount">
                        <i class="fa-solid fa-copy"></i> Number of countries
                        <span class="sort-indicator"></span>
                    </th>
                    <th class="td-center sortable" data-sort-key="status">
                        <i class="fa-solid fa-clipboard-question"></i> Status
                        <span class="sort-indicator"></span>
                    </th>
                </tr>
                <tr class="column-filters">
                    <th>
                        <input type="text" class="form-control column-filter" data-column="campaign_name"
                            placeholder="Filter...">
                    </th>
                    <th>
                        <input type="text" class="form-control column-filter" data-column="orderNumbers"
                            placeholder="Filter...">
                    </th>
                    <th>
                        <input type="date" class="form-control column-filter" data-column="date_admission">
                    </th>
                    <th>
                        <input type="date" class="form-control column-filter" data-column="end_date">
                    </th>
                    <th>
                        <input type="number" class="form-control column-filter" data-column="campaign_progress"
                            placeholder="%">
                    </th>
                    <th>
                        <input type="number" class="form-control column-filter" data-column="subcampaignsCount"
                            placeholder="#">
                    </th>
                    <th>
                        <select class="form-control column-filter" data-column="status">
                            <option value="">All</option>
                            <option value="Completed">Completed</option>
                            <option value="In Progress">In Progress</option>
                        </select>
                    </th>
                </tr>
            </thead>
            <tbody id="campaignsBodyActive">
                @foreach($activeCampaigns as $campaign)

                <tr class="main-row" data-id="{{ $campaign->id }}" data-campaign-name="{{ $campaign->campaign_name }}"
                    data-order-numbers="{{ $campaign->orderNumbers }}"
                    data-date-admission="{{ $campaign->getDateAdmission() ? $campaign->getDateAdmission()->format('Y-m-d') : ''  }}" data-end-date="{{ $campaign->getEndDate() ? $campaign->getEndDate()->format('Y-m-d') : ''}}"
                    data-campaign-progress="{{ $campaign->campaign_progress }}"
                    data-subcampaigns-count="{{ $campaign->subcampaignsCount }}"
                    data-status="{{ $campaign->status_txt }}" data-widget="expandable-table" aria-expanded="false">
                    <!-- Zawartość głównego wiersza -->

                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i>
                        {{ $campaign->campaign_name }}
                    </td>
                    <td class="td-center">{{ $campaign->orderNumbers }}</td>
                    <td class="td-center">
                        {{ $campaign->getDateAdmission() ? $campaign->getDateAdmission()->format('Y-m-d') : 'N/A'  }}
                    </td>
                    <td class="td-center">
                        {{ $campaign->getEndDate() ? $campaign->getEndDate()->format('Y-m-d') : 'N/A' }}
                    </td>
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
                <tr class="expandable-body" data-parent-id="{{ $campaign->id }}">
                    <td colspan="7">
                        <table class="table table-bordered table-hover sub-campaign-table">
                            <thead>
                                <tr>
                                    <th class="td-min-40"><i class="fa-solid fa-envelope"></i> Sub-campaign name</th>
                                    <th class="td-center"><i class="fa-solid fa-bars-staggered"></i> PGX order number
                                    </th>
                                    <th class="td-center"><i class="fa-solid fa-copy"></i> Quantity</th>
                                    <th class="td-center"><i class="fa-solid fa-calendar-days"></i> Estimated delivery
                                        time</th>
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
                                    <td class="td-center">{{ number_format($subcampaign->quantity, 0, ',', ' ') }} pcs.
                                    </td>
                                    <td class="td-center">
                                        @php
                                        /*$deliveryStatus = $subcampaign->statuses->firstWhere('status.status_name',
                                        'Estimated delivery time');
                                        $deliveryDate = $deliveryStatus ?
                                        \Carbon\Carbon::parse($deliveryStatus->status_date)->format('Y-m-d') : 'TBC';*/
                                        $deliveryStatus = $subcampaign->statuses->firstWhere('status.status_name',
                                        'Estimated delivery time');
                                        $shipmentDispatch = $subcampaign->statuses->firstWhere('status.status_name',
                                        'Shipment dispatch');

                                        if ($deliveryStatus &&
                                        (\Carbon\Carbon::parse($deliveryStatus->status_date)->isPast() ||
                                        $shipmentDispatch)) {
                                        $deliveryDate =
                                        \Carbon\Carbon::parse($deliveryStatus->status_date)->format('Y-m-d');
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

        <div class="pagination-container mt-3">
            <div class="pagination-info mb-2"></div>
            <nav>
                <ul class="pagination justify-content-center" id="activeCampaignsTablePagination"></ul>
            </nav>
        </div>
    </div>
</div>

<!-- KAMPANIE ZAKONCZONE-->
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-check-circle "></i> Completed Campaigns</h3>
        <div class="card-tools">
            <div class="dataTables-controls" id="completedCampaigns_global_filter">
                <div class="input-group">
                    <input type="text" id="completedGlobalFilter" class="form-control" placeholder="Search all columns...">
                    <div class="input-group-append">
                        <button class="btn btn-default" id="completedResetFilters">
                            <i class="fa fa-undo"></i> Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover" id="completedCampaignsTable">
            <thead>
                <tr>
                    <th class="td-min-40 sortable" data-sort-key="campaign_name">
                        <i class="fa-solid fa-envelope"></i> Campaign name
                        <span class="sort-indicator"></span>
                    </th>
                    <th class="td-center sortable" data-sort-key="orderNumbers">
                        <i class="fa-solid fa-bars-staggered"></i> PGX order number
                        <span class="sort-indicator"></span>
                    </th>
                    <th class="td-center sortable" data-sort-key="date_admission">
                        <i class="fa-solid fa-calendar-days"></i> Date of admission
                        <span class="sort-indicator"></span>
                    </th>
                    <th class="td-center sortable" data-sort-key="end_date">
                        <i class="fa-solid fa-calendar-days"></i> End date
                        <span class="sort-indicator"></span>
                    </th>
                    <th class="td-center sortable" data-sort-key="campaign_progress">
                        <i class="fa-solid fa-percent"></i> Progress
                        <span class="sort-indicator"></span>
                    </th>
                    <th class="td-center sortable" data-sort-key="subcampaignsCount">
                        <i class="fa-solid fa-copy"></i> Number of countries
                        <span class="sort-indicator"></span>
                    </th>
                    <th class="td-center sortable" data-sort-key="status">
                        <i class="fa-solid fa-clipboard-question"></i> Status
                        <span class="sort-indicator"></span>
                    </th>
                </tr>
                <tr class="column-filters">
                    <th>
                        <input type="text" class="form-control column-filter" data-column="campaign_name"
                            placeholder="Filter...">
                    </th>
                    <th>
                        <input type="text" class="form-control column-filter" data-column="orderNumbers"
                            placeholder="Filter...">
                    </th>
                    <th>
                        <input type="date" class="form-control column-filter" data-column="date_admission">
                    </th>
                    <th>
                        <input type="date" class="form-control column-filter" data-column="end_date">
                    </th>
                    <th>
                        <input type="number" class="form-control column-filter" data-column="campaign_progress"
                            placeholder="%">
                    </th>
                    <th>
                        <input type="number" class="form-control column-filter" data-column="subcampaignsCount"
                            placeholder="#">
                    </th>
                    <th>
                        <select class="form-control column-filter" data-column="status">
                            <option value="">All</option>
                            <option value="Completed">Completed</option>
                            <option value="In Progress">In Progress</option>
                        </select>
                    </th>
                </tr>
            </thead>
            <tbody id="campaignsBodyCompleted">
                @foreach($completedCampaigns as $campaign)

                <tr class="main-row" data-id="{{ $campaign->id }}" data-campaign-name="{{ $campaign->campaign_name }}"
                    data-order-numbers="{{ $campaign->orderNumbers }}"
                    data-date-admission="{{ $campaign->getDateAdmission() ? $campaign->getDateAdmission()->format('Y-m-d') : ''  }}" data-end-date="{{ $campaign->getEndDate() ? $campaign->getEndDate()->format('Y-m-d') : ''}}"
                    data-campaign-progress="{{ $campaign->campaign_progress }}"
                    data-subcampaigns-count="{{ $campaign->subcampaignsCount }}"
                    data-status="{{ $campaign->status_txt }}" data-widget="expandable-table" aria-expanded="false">
                    <!-- Zawartość głównego wiersza -->

                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i>
                        {{ $campaign->campaign_name }}
                    </td>
                    <td class="td-center">{{ $campaign->orderNumbers }}</td>
                    <td class="td-center">
                        {{ $campaign->getDateAdmission() ? $campaign->getDateAdmission()->format('Y-m-d') : 'N/A'  }}
                    </td>
                    <td class="td-center">
                        {{ $campaign->getEndDate() ? $campaign->getEndDate()->format('Y-m-d') : 'N/A' }}
                    </td>
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
                <tr class="expandable-body" data-parent-id="{{ $campaign->id }}">
                    <td colspan="7">
                        <table class="table table-bordered table-hover sub-campaign-table">
                            <thead>
                                <tr>
                                    <th class="td-min-40"><i class="fa-solid fa-envelope"></i> Sub-campaign name</th>
                                    <th class="td-center"><i class="fa-solid fa-bars-staggered"></i> PGX order number
                                    </th>
                                    <th class="td-center"><i class="fa-solid fa-copy"></i> Quantity</th>
                                    <th class="td-center"><i class="fa-solid fa-calendar-days"></i> Estimated delivery
                                        time</th>
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
                                    <td class="td-center">{{ number_format($subcampaign->quantity, 0, ',', ' ') }} pcs.
                                    </td>
                                    <td class="td-center">
                                        @php
                                        /*$deliveryStatus = $subcampaign->statuses->firstWhere('status.status_name',
                                        'Estimated delivery time');
                                        $deliveryDate = $deliveryStatus ?
                                        \Carbon\Carbon::parse($deliveryStatus->status_date)->format('Y-m-d') : 'TBC';*/
                                        $deliveryStatus = $subcampaign->statuses->firstWhere('status.status_name',
                                        'Estimated delivery time');
                                        $shipmentDispatch = $subcampaign->statuses->firstWhere('status.status_name',
                                        'Shipment dispatch');

                                        if ($deliveryStatus &&
                                        (\Carbon\Carbon::parse($deliveryStatus->status_date)->isPast() ||
                                        $shipmentDispatch)) {
                                        $deliveryDate =
                                        \Carbon\Carbon::parse($deliveryStatus->status_date)->format('Y-m-d');
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

        <div class="pagination-container mt-3">
            <div class="pagination-info mb-2"></div>
            <nav>
                <ul class="pagination justify-content-center" id="completedCampaignsTablePagination"></ul>
            </nav>
        </div>
    </div>
</div>


<script>
class CampaignTable {
    constructor(tableId) {
        this.table = document.getElementById(tableId);
        this.paginationId = `${tableId}Pagination`;
        this.globalFilterId = tableId + '_global_filter';
        this.itemsPerPage = 10;
        this.currentPage = 1;
        this.currentSort = { key: null, direction: 'asc' };
        this.init();
    }

    init() {
        this.groupedRows = this.createRowGroups();
        this.addSorting();
        this.addFilters();
        this.setupPagination();
        this.updateTable();
        this.initExpandable();
    }

    createRowGroups() {
        const groups = [];
        const mainRows = this.table.querySelectorAll('tr.main-row');
        
        mainRows.forEach(mainRow => {
            const expandableRow = mainRow.nextElementSibling;
            if(expandableRow && expandableRow.classList.contains('expandable-body')) {
                // Popraw mapowanie nazw atrybutów
                groups.push({
                    main: mainRow,
                    expandable: expandableRow,
                    dataset: {
                        campaign_name: mainRow.dataset.campaignName,
                        orderNumbers: mainRow.dataset.orderNumbers,
                        date_admission: mainRow.dataset.dateAdmission,
                        end_date: mainRow.dataset.endDate,
                        campaign_progress: mainRow.dataset.campaignProgress,
                        subcampaignsCount: mainRow.dataset.subcampaignsCount,
                        status: mainRow.dataset.status
                    }
                });
            }
        });
        
        return groups;
    }

    addSorting() {
        this.table.querySelectorAll('.sortable').forEach(header => {
            header.addEventListener('click', () => {
                const sortKey = header.dataset.sortKey;
                if(this.currentSort.key === sortKey) {
                    this.currentSort.direction = this.currentSort.direction === 'asc' ? 'desc' : 'asc';
                } else {
                    this.currentSort.key = sortKey;
                    this.currentSort.direction = 'asc';
                }
                this.updateSortIndicators();
                this.updateTable();
            });
        });
    }

    sortGroups() {
        if (!this.currentSort.key) return;

        const direction = this.currentSort.direction === 'asc' ? 1 : -1;

        this.groupedRows.sort((a, b) => {
            const aVal = a.dataset[this.currentSort.key];
            const bVal = b.dataset[this.currentSort.key];
            let comparison = 0;

            if (this.currentSort.key.includes('date')) {
                comparison = this.compareDates(aVal, bVal);
            } else if (['campaign_progress', 'subcampaignsCount'].includes(this.currentSort.key)) {
                comparison = this.compareNumbers(aVal, bVal);
            } else {
                comparison = this.compareStrings(aVal, bVal);
            }

            return comparison * direction;
        });
    }

    addFilters() {
        const globalFilter = document.getElementById(this.globalFilterId)?.querySelector('#globalFilter');
        const resetBtn = document.getElementById(this.globalFilterId)?.querySelector('#resetFilters');

        this.table.querySelectorAll('.column-filter').forEach(input => {
            input.addEventListener('input', () => {
                this.currentPage = 1;
                this.updateTable();
            });
        });

        if(globalFilter) globalFilter.addEventListener('input', () => {
            this.currentPage = 1;
            this.updateTable();
        });

        if(resetBtn) {
            resetBtn.addEventListener('click', () => {
                // Resetuj wszystkie filtry
                this.table.querySelectorAll('.column-filter').forEach(input => {
                    if(input.tagName === 'SELECT') {
                        input.value = '';
                    } else {
                        input.value = '';
                    }
                });
                
                const globalFilter = document.getElementById(this.globalFilterId)?.querySelector('#globalFilter');
                if(globalFilter) globalFilter.value = '';
                
                // Przefiltruj ponownie
                this.currentPage = 1;
                this.updateTable();
            });
        }
    }

    applyFilters() {
        const globalFilter = document.getElementById(this.globalFilterId)?.querySelector('#globalFilter')?.value.toLowerCase().trim();
        const columnFilters = {
            campaign_name: this.table.querySelector('[data-column="campaign_name"]')?.value.toLowerCase().trim(),
            orderNumbers: this.table.querySelector('[data-column="orderNumbers"]')?.value.toLowerCase().trim(),
            date_admission: this.table.querySelector('[data-column="date_admission"]')?.value,
            end_date: this.table.querySelector('[data-column="end_date"]')?.value,
            campaign_progress: this.table.querySelector('[data-column="campaign_progress"]')?.value,
            subcampaignsCount: this.table.querySelector('[data-column="subcampaignsCount"]')?.value,
            status: this.table.querySelector('[data-column="status"]')?.value
        };

        this.groupedRows.forEach(group => {
            let visible = true;
            const data = group.dataset;

            // Filtrowanie kolumnowe
            Object.entries(columnFilters).forEach(([key, value]) => {
                if(value && value !== '') {
                    const dataValue = data[key]?.toString().toLowerCase() || '';
                    
                    if(key.includes('date')) {
                        const filterDate = new Date(value);
                        const rowDate = new Date(data[key]);
                        visible = visible && (!isNaN(filterDate) && !isNaN(rowDate) 
                            && filterDate.getTime() === rowDate.getTime());
                    } 
                    else if(['campaign_progress', 'subcampaignsCount'].includes(key)) {
                        visible = visible && (parseFloat(data[key] || 0) >= parseFloat(value));
                    } 
                    else {
                        visible = visible && dataValue.includes(value.toLowerCase());
                    }
                }
            });

            // Filtrowanie globalne
            if(globalFilter) {
                const searchValues = [
                    data.campaign_name,
                    data.orderNumbers,
                    data.date_admission,
                    data.end_date,
                    data.campaign_progress,
                    data.subcampaignsCount,
                    data.status
                ].join(' ').toLowerCase();
                
                visible = visible && searchValues.includes(globalFilter);
            }

            group.visible = visible;
        });
    }

    setupPagination() {
        const pagination = document.getElementById(this.paginationId );
        if(pagination) pagination.addEventListener('click', (e) => {
            const pageItem = e.target.closest('.page-item');
            if(pageItem) {
                this.currentPage = parseInt(pageItem.dataset.page);
                this.updateTable();
            }
        });
    }

    updateTable() {
        this.sortGroups();
        this.applyFilters();

        const visibleGroups = this.groupedRows.filter(g => g.visible);
        const startIdx = (this.currentPage - 1) * this.itemsPerPage;
        const endIdx = startIdx + this.itemsPerPage;

        const tbody = this.table.querySelector('tbody');
        tbody.innerHTML = '';

        visibleGroups.slice(startIdx, endIdx).forEach(group => {
            // Resetowanie stanu rozwijania
            group.expandable.style.display = 'none';
            group.main.querySelector('.icon-campaigne').classList.remove('fa-folder-open');
            group.main.querySelector('.icon-campaigne').classList.add('fa-folder-plus');

            tbody.appendChild(group.main);
            tbody.appendChild(group.expandable);
        });

        this.updatePagination(visibleGroups.length);
        this.updateSortIndicators();
    }

    updatePagination(totalVisible) {
        const paginationInfo = this.table.parentElement.querySelector('.pagination-info');
        const pagination = this.table.parentElement.querySelector('.pagination');
        const totalPages = Math.ceil(totalVisible / this.itemsPerPage);

        if(paginationInfo) {
            const start = totalVisible === 0 ? 0 : (this.currentPage - 1) * this.itemsPerPage + 1;
            const end = Math.min(this.currentPage * this.itemsPerPage, totalVisible);
            paginationInfo.textContent = `Showing ${start}-${end} of ${totalVisible} records`;
        }

        if(pagination) {
            pagination.innerHTML = '';
            for(let i = 1; i <= totalPages; i++) {
                pagination.innerHTML += `
                    <li class="page-item ${i === this.currentPage ? 'active' : ''}" data-page="${i}">
                        <a class="page-link">${i}</a>
                    </li>
                `;
            }
        }
    }

    initExpandable() {
        this.table.addEventListener('click', (e) => {
            const mainRow = e.target.closest('.main-row');
            if(mainRow) {
                const expandableRow = mainRow.nextElementSibling;
                const isExpanded = expandableRow.style.display === 'none';
                    
                expandableRow.style.display = isExpanded ? '' : 'none';
                mainRow.querySelector('.icon-campaigne').classList.toggle('fa-folder-plus', !isExpanded);
                mainRow.querySelector('.icon-campaigne').classList.toggle('fa-folder-open', isExpanded);
            }
        });
    }

    // Metody pomocnicze
    compareStrings(a, b) {
        a = a || '';
        b = b || '';
        return a.localeCompare(b);
    }

    compareDates(a, b) {
        const dateA = a ? new Date(a) : new Date(0);
        const dateB = b ? new Date(b) : new Date(0);
        return dateA - dateB;
    }

    compareNumbers(a, b) {
        return (parseFloat(a) || 0) - (parseFloat(b) || 0);
    }

    updateSortIndicators() {
        this.table.querySelectorAll('.sortable').forEach(header => {
            const indicator = header.querySelector('.sort-indicator');
            if(header.dataset.sortKey === this.currentSort.key) {
                indicator.innerHTML = this.currentSort.direction === 'asc' ? ' ↑' : ' ↓';
            } else {
                indicator.innerHTML = '';
            }
        });
    }
}

// Inicjalizacja tabeli
document.addEventListener('DOMContentLoaded', () => {
    new CampaignTable('activeCampaignsTable');
    new CampaignTable('completedCampaignsTable');
});
</script>