@extends('adminlte::page')

@section('title', 'ZooPlus Dashboard - Panel administracyjny')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
        <h3 class="card-title">Dodaj podkampanie do: {{ $campaign->campaign_name }}</h3>
        <div>
            <button type="button" class="btn btn-sm btn-secondary mr-2" id="toggleAllStatuses" title="Rozwiń wszystkie">
                <i class="fas fa-expand mr-1"></i> Rozwiń/zwiń wszystkie
            </button>
            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#bulkDatesModal">
                <i class="fas fa-calendar-alt mr-1"></i> Masowe ustawianie dat
            </button>
        </div>
    </div>

        <div class="card-body">
            <a href="{{ url('/admin/campaigns/'.$campaign->id) }}" class="btn btn-warning btn-sm">
                <i class="fas fa-arrow-left mr-1"></i> Wróć
            </a>
            
            <form method="POST" action="{{ url('/admin/subcampaigns') }}" id="mainForm">
                @csrf
                <input type="hidden" name="campaign_id" value="{{ $campaign_id }}">

                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-hover" id="subcampaignsTable">
                        <thead class="bg-light">
                            <tr>
                                <th width="30"></th>
                                <th>Nazwa podkampanii</th>
                                <th>Kraj</th>
                                <th>Numer zamówienia</th>
                                <th>Ilość</th>
                                <th>Statusy</th>
                                <th width="80">Akcje</th>
                            </tr>
                        </thead>
                        <tbody id="mainTBody">
                            <!-- Początkowy wiersz -->
                            @include('adminSubcampaigns.subcampaigns.subcampaign-group', ['index' => 0])
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <button type="button" class="btn btn-success" id="addSubcampaign">
                        <i class="fas fa-plus mr-1"></i> Dodaj podkampanię
                    </button>
                    <button type="submit" class="btn btn-primary float-right">
                        <i class="fas fa-save mr-1"></i> Zapisz wszystkie
                    </button>
                </div>
            </form>
        </div>
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
                                    <input type="checkbox" 
                                           class="custom-control-input" 
                                           id="statusCheck{{ $status->id }}" 
                                           data-status-id="{{ $status->id }}">
                                    <label class="custom-control-label" for="statusCheck{{ $status->id }}">
                                        {{ $status->status_name }}
                                    </label>
                                </div>
                                <input type="datetime-local" 
                                       class="form-control bulk-date-input" 
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

<template id="subcampaign-template">
    @include('adminSubcampaigns.subcampaigns.subcampaign-group', ['index' => '%%INDEX%%'])
</template>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    .btn-toggle-statuses .fa-chevron-down { transform: rotate(0deg); transition: transform 0.3s; }
    .btn-toggle-statuses.collapsed .fa-chevron-down { transform: rotate(-90deg); }
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
        box-shadow: 0 0 10px rgba(0,123,255,0.3);
    }
    .subcampaign-group.collapsed + .statuses-row {
        display: none;
    }
    
    .btn-toggle-statuses .fa-chevron-down {
        transition: transform 0.3s ease;
    }
    .subcampaign-group.collapsed .btn-toggle-statuses .fa-chevron-down {
        transform: rotate(-90deg);
    }
    .fa-expand { transform: rotate(0deg); transition: transform 0.3s; }
    .fa-compress { transform: rotate(90deg); }
</style>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
$(document).ready(function() {
    let subcampaignIndex = 1;

    // Inicjalizacja Select2
    function initSelect2(element) {
        element.select2({
            placeholder: "Wybierz kraj",
            allowClear: true,
            width: '100%',
            language: { noResults: () => "Brak wyników" }
        });
    }

    initSelect2($('.select2-country'));

    // Dodawanie nowej podkampanii
    $('#addSubcampaign').click(function() {
        const templateContent = $('#subcampaign-template').html()
            .replace(/%%INDEX%%/g, subcampaignIndex);
        
        const $template = $(templateContent);
        $('#mainTBody').append($template);
        
        initSelect2($template.find('.select2-country'));
        subcampaignIndex++;
        syncCollapseState();
    });

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

    // Usuwanie podkampanii
    $(document).on('click', '.btn-remove-row', function() {
        const $group = $(this).closest('.subcampaign-group');
        $group.next('.statuses-row').remove();
        $group.remove();
    });

    // Walidacja dat
    $(document).on('change', 'input[type="datetime-local"]', function() {
        const $row = $(this).closest('tr');
        const currentDate = new Date($(this).val());
        
        $row.nextAll('tr').find('input[type="datetime-local"]').each(function() {
            const prevDate = new Date($(this).prev().val());
            if(currentDate > prevDate) {
                $(this).attr('min', currentDate.toISOString().slice(0,16));
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
        const today = new Date().toISOString().slice(0,16);
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