@php
$index = $index ?? 0;
$subcampaign = $subcampaign ?? null;
$isNew = is_null($subcampaign);
@endphp

<tr class="subcampaign-group @if($isNew) new-item @endif" data-id="{{ $subcampaign->id ?? '' }}">
    @if(!$isNew)
    <input type="hidden" name="subcampaigns[{{ $index }}][id]" value="{{ $subcampaign->id }}">
    @endif

    <td class="align-middle text-center">
        <button type="button" class="btn btn-sm btn-toggle-statuses">
            <i class="fas fa-chevron-down"></i>
        </button>
    </td>

    <td>
        <input class="form-control form-control-sm" name="subcampaigns[{{ $index }}][subcampaign_name]"
            value="{{ $subcampaign->subcampaign_name ?? '' }}" required>
    </td>

    <td>
        <select class="form-control form-control-sm select2-country" name="subcampaigns[{{ $index }}][country_id]"
            required>
            <option value="">Wybierz kraj</option>
            @foreach($countries as $country)
            <option value="{{ $country->id }}" @selected($country->id == ($subcampaign->country_id ?? ''))>
                {{ $country->name }}
            </option>
            @endforeach
        </select>
    </td>

    <td>
        <input class="form-control form-control-sm" name="subcampaigns[{{ $index }}][order_number]"
            value="{{ $subcampaign->order_number ?? '' }}">
    </td>

    <td>
        <input class="form-control form-control-sm" type="number" min="0" name="subcampaigns[{{ $index }}][quantity]"
            value="{{ $subcampaign->quantity ?? '' }}">
    </td>

    <td class="status-counter">
        {{ count($statuses) }} statusów
    </td>

    <td>
        <button type="button" class="btn btn-danger btn-sm btn-delete">
            <i class="fas fa-trash"></i>
        </button>
    </td>
</tr>

<tr class="statuses-row">
    <td colspan="7">
        <div class="statuses-container p-3">
            <table class="table table-sm">
                <tbody>
                    @foreach($statuses as $statusIndex => $status)
                    @php
                    // Bezpieczne pobieranie statusów dla nowych i istniejących podkampanii
                    $subStatus = $subcampaign
                    ? $subcampaign->statuses->firstWhere('status_id', $status->id)
                    : null;
                    @endphp

                    <tr>
                        <td>
                            <input type="hidden" name="subcampaigns[{{ $index }}][statuses][{{ $statusIndex }}][id]"
                                value="{{ $subStatus->id ?? '' }}">
                            <input type="hidden"
                                name="subcampaigns[{{ $index }}][statuses][{{ $statusIndex }}][status_id]"
                                value="{{ $status->id }}">
                            {{ $status->status_name }}
                        </td>
                        <td>
                            <input type="datetime-local" data-status-id="{{$status->id}}"
                                class="form-control form-control-sm"
                                name="subcampaigns[{{ $index }}][statuses][{{ $statusIndex }}][status_date]"
                                value="{{ $subStatus->status_date ?? null }}"
                                @if(false) min="{{ now()->setTime(0,0)->format('Y-m-d\TH:i') }}" required @endif >
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </td>
</tr>