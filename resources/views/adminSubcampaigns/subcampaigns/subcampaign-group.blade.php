@php
    $index = $index ?? 0;
@endphp

<!-- Grupa dla jednej podkampanii -->
<tr class="subcampaign-group collapsed">
    <td class="align-middle text-center">
        <button type="button" class="btn btn-sm btn-toggle-statuses" title="Zwiń statusy">
            <i class="fas fa-chevron-down"></i>
        </button>
    </td>
    <td>
        <input class="form-control form-control-sm" 
               name="subcampaigns[{{ $index }}][subcampaign_name]" 
               required>
    </td>
    <td>
        <select class="form-control form-control-sm select2-country" 
                name="subcampaigns[{{ $index }}][country_id]" 
                required>
            <option value="">Wybierz</option>
            @foreach($countries as $country)
            <option value="{{ $country->id }}">{{ $country->flag_image }} {{ $country->name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <input class="form-control form-control-sm" 
               name="subcampaigns[{{ $index }}][order_number]" 
               type="text">
    </td>
    <td>
        <input class="form-control form-control-sm" 
               name="subcampaigns[{{ $index }}][quantity]" 
               type="number" 
               min="0">
    </td>
    <td class="status-counter">{{ count($statuses) }} statusów</td>
    <td>
        <button type="button" class="btn btn-danger btn-sm btn-remove-row">
            <i class="fas fa-trash"></i>
        </button>
    </td>
</tr>

<!-- Wiersz ze statusami -->
<tr class="statuses-row">
    <td colspan="7">
        <div class="statuses-container p-3">
            <table class="table table-sm">
                <tbody>
                @foreach($statuses as $statusIndex => $status)
                    <tr>
                        <td>
                            <input type="hidden" 
                                name="subcampaigns[{{ $index }}][statuses][{{ $statusIndex }}][status_id]" 
                                value="{{ $status->id }}">
                            {{ $status->status_name }}
                        </td>
                        <td>
                            <input type="datetime-local" 
                                class="form-control form-control-sm" 
                                name="subcampaigns[{{ $index }}][statuses][{{ $statusIndex }}][status_date]" 
                                data-status-id="{{ $status->id }}"
                                value="{{ now()->setTime(0,0)->format('Y-m-d\TH:i') }}"
                                @if($statusIndex > 0) 
                                min="{{ now()->setTime(0,0)->format('Y-m-d\TH:i') }}" 
                                @endif
                                required>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </td>
</tr>