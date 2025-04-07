@extends('adminlte::page')

@section('title', 'Zarządzanie podkampaniami')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
            <h3 class="card-title">Zarządzanie podkampaniami: {{ $campaign->campaign_name }}</h3>
            <div>
                <button type="button" class="btn btn-sm btn-secondary mr-2" id="toggleAllStatuses">
                    <i class="fas fa-expand mr-1"></i> Rozwiń/zwiń wszystkie
                </button>
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#bulkDatesModal">
                    <i class="fas fa-calendar-alt mr-1"></i> Masowe daty
                </button>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.subcampaigns.save', $campaign) }}">
            @csrf
            <div id="deletedSubcampaigns"></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="subcampaignsTable">
                        <thead class="bg-light">
                            <tr>
                                <th width="30"></th>
                                <th>Nazwa</th>
                                <th>Kraj</th>
                                <th>Nr zamówienia</th>
                                <th>Ilość</th>
                                <th>Statusy</th>
                                <th width="80">
                                    <button type="button" class="btn btn-success btn-sm" id="addSubcampaign">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="mainTBody">
                            @forelse($campaign->subcampaigns as $index => $subcampaign)
                            @include('adminSubcampaigns.subcampaigns.subcampaign-row', [
                            'index' => $index,
                            'subcampaign' => $subcampaign
                            ])
                            @empty
                            @include('adminSubcampaigns.subcampaigns.subcampaign-row', [
                            'index' => 0,
                            'subcampaign' => null
                            ])
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i> Zapisz wszystkie zmiany
                </button>
                <a href="{{ route('admin.campaigns.index') }}" class="btn btn-default">Anuluj</a>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="bulkDatesModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Masowe ustawianie dat statusów</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <button type="button" class="btn btn-sm btn-secondary" id="setTodayAll">
                            Ustaw wszystkie na dzisiaj
                        </button>
                    </div>
                </div>
                <div class="row">
                    @foreach($statuses as $status)
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input"
                                        id="statusCheck{{ $status->id }}" data-status-id="{{ $status->id }}">
                                    <label class="custom-control-label" for="statusCheck{{ $status->id }}">
                                        {{ $status->status_name }}
                                    </label>
                                </div>
                                <input type="datetime-local" class="form-control bulk-date-input"
                                    data-status-id="{{ $status->id }}"
                                    value="{{ now()->setTime(0,0)->format('Y-m-d\TH:i') }}">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                <button type="button" class="btn btn-primary" id="applyBulkDates">Zastosuj daty</button>
            </div>
        </div>
    </div>
</div>
<template id="subcampaign-template">@include('adminSubcampaigns.subcampaigns.subcampaign-row', ['index' => '%%INDEX%%',
    'subcampaign' => null])</template>
@endsection

@section('css')
<style>
.statuses-container {
    border-left: 4px solid #007bff;
    background: #f8f9fa;
}

.select2-container--default .select2-selection--single {
    height: 31px;
    padding-top: 3px;
}

.statuses-row {
    display: table-row;
}

.collapsed .statuses-row {
    display: none;
}

.btn-toggle-statuses .fa-chevron-down {
    transform: rotate(0deg);
    transition: transform 0.3s;
}

.btn-toggle-statuses.collapsed .fa-chevron-down {
    transform: rotate(-90deg);
}

.bulk-date-input:disabled {
    background: #e9ecef;
    cursor: not-allowed;
}

.custom-control-label {
    user-select: none;
}

#bulkDatesModal .card {
    transition: box-shadow 0.3s;
}

#bulkDatesModal .card:hover {
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
}

.subcampaign-group.collapsed+.statuses-row {
    display: none;
}

.btn-toggle-statuses .fa-chevron-down {
    transition: transform 0.3s ease;
}

.subcampaign-group.collapsed .btn-toggle-statuses .fa-chevron-down {
    transform: rotate(-90deg);
}

.fa-expand {
    transform: rotate(0deg);
    transition: transform 0.3s;
}

.fa-compress {
    transform: rotate(90deg);
}

tr.subcampaign-group {
    background: #f8f9fa;
    transition: background 0.3s;
}

tr.subcampaign-group:hover {
    background: #e9ecef;
}
</style>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    
    let subcampaignIndex = {{ $campaign->subcampaigns->count() ?? 0 }};
    // Dodawanie nowej podkampanii
    $('#addSubcampaign').click(function() {
        const template = $('#subcampaign-template').html().replace(/%%INDEX%%/g, subcampaignIndex++);
        $('#mainTBody').append(template);
        //initSelect2($('#mainTBody').find('.select2-country').last());
    });

    // Usuwanie podkampanii
    $(document).on('click', '.btn-delete', function() {
        const $row = $(this).closest('tr.subcampaign-group');
        const id = $row.data('id');

        if (id) {
            $('#deletedSubcampaigns').append(
                `<input type="hidden" name="deleted_subcampaigns[]" value="${id}">`
            );
        }

        $row.next('tr.statuses-row').remove();
        $row.remove();
    });

    // Inicjalizacja Select2
    /*function initSelect2(element) {
        element.select2({
            placeholder: "Wybierz kraj",
            allowClear: true,
            width: '100%',
            language: {
                noResults: () => "Brak wyników"
            }
        });
    }*/

    //initSelect2($('.select2-country'));

    // Obsługa zwijania/rozwijania statusów
    $(document).on('click', '.btn-toggle-statuses', function() {
        const $group = $(this).closest('.subcampaign-group');
        $group.toggleClass('collapsed');

        // Ręczna aktualizacja widoczności
        const $statusRow = $group.next('.statuses-row');
        $statusRow.toggle(!$group.hasClass('collapsed'));
    });

    function syncCollapseState() {
        $('.subcampaign-group').each(function() {
            const $group = $(this);
            const $statusRow = $group.next('.statuses-row');
            $statusRow.toggle(!$group.hasClass('collapsed'));
        });
    }
    // Walidacja dat
    $(document).on('change', 'input[type="datetime-local"]', function() {
        const $row = $(this).closest('tr');
        const currentDate = new Date($(this).val());

        $row.nextAll('tr').find('input[type="datetime-local"]').each(function() {
            const prevDate = new Date($(this).prev().val());
            if (currentDate > prevDate) {
                $(this).attr('min', currentDate.toISOString().slice(0, 16));
            }
        });
    });
    // Zarządzanie globalnym zwijaniem/rozwijaniem
    let allExpanded = false; // Domyślnie zwinięte

    $('#toggleAllStatuses').click(function() {
        allExpanded = !allExpanded;

        // Toggle klasy dla wszystkich grup
        $('.subcampaign-group')
            .toggleClass('collapsed', !allExpanded)
            .next('.statuses-row')
            .toggle(allExpanded);

        // Aktualizacja ikony
        const $icon = $(this).find('i');
        $icon.toggleClass('fa-expand fa-compress');

        // Aktualizacja tooltipa
        $(this).attr('title', allExpanded ? 'Zwiń wszystkie' : 'Rozwiń wszystkie');
    });
    // Masowe ustawianie dat
    $('#setTodayAll').click(function() {
        const today = new Date().toISOString().slice(0, 16);
        $('.bulk-date-input').val(today);
    });

    $('#applyBulkDates').click(function() {
        $('.custom-control-input:checked').each(function() {
            const statusId = $(this).data('status-id');
            const dateValue = $(`[data-status-id="${statusId}"].bulk-date-input`).val();

            $(`input[data-status-id="${statusId}"]`).val(dateValue).trigger('change');
        });
        $('.modal').modal('hide');
        $('.modal.in').hide();
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    });

    // Aktualizacja checkboxów w modal
    $('.custom-control-input').change(function() {
        const statusId = $(this).data('status-id');
        $(`[data-status-id="${statusId}"].bulk-date-input`).prop('disabled', !$(this).prop('checked'));
    });
});
</script>
@endsection