@extends('adminlte::page')

@section('title', 'ZooPlus Dashboard - Zarządzanie kampaniami')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Kampanie</h3>
            <div>
                <a href="{{ url('/admin/campaigns/create') }}" class="btn btn-sm btn-success mr-2">
                    <i class="fas fa-plus mr-1"></i> Nowa kampania
                </a>
                <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal"
                    data-target="#campaignsHelpModal">
                    <i class="fas fa-question-circle mr-1"></i> Pomoc
                </button>
            </div>
        </div>

        <div class="card-body">
            <form method="GET" action="{{ url('/admin/campaigns') }}">
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Wyszukaj kampanię..."
                        value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th width="40"></th>
                            <th>Nazwa kampanii</th>
                            <th width="180">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($campaigns as $item)
                        <tr class="campaign-row {{ $item->is_visible ? '' : 'table-secondary' }}">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ url('/admin/campaigns/' . $item->id) }}"
                                    class="{{ $item->is_visible ? 'text-dark' : 'text-muted' }}">
                                    {{ $item->campaign_name }}
                                    @unless($item->is_visible)
                                    <i class="fas fa-eye-slash ml-1" title="Kampania ukryta"></i>
                                    @endunless
                                </a>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ url('/admin/campaigns/'.$item->id.'/subcampaigns') }}"
                                        class="btn btn-sm btn-info mr-1" title="Podkampanie">
                                        <i class="fas fa-layer-group"></i>
                                    </a>

                                    <a href="{{ url('/admin/campaigns/' . $item->id . '/edit') }}"
                                        class="btn btn-sm btn-primary mr-1" title="Edytuj">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form method="POST" action="{{ url('/admin/campaigns' . '/' . $item->id) }}"
                                        class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" title="Usuń"
                                            onclick="return confirm('Na pewno usunąć kampanię?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="mb-2 mb-md-0 text-muted small">
                        Wyświetlono od {{ $campaigns->firstItem() }} do {{ $campaigns->lastItem() }} z
                        {{ $campaigns->total() }} pozycji
                    </div>
                    <div class="d-flex align-items-center">
                        <ul class="pagination mb-0">
                            {{ $campaigns->appends(['search' => Request::get('search')])->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
.card-header {
    padding: 0.75rem 1.25rem;
}

.campaign-row {
    transition: background-color 0.2s ease;
}

.campaign-row:hover {
    background-color: #f8f9fa;
}

.btn-sm {
    padding: 0.25rem 0.5rem;
    min-width: 32px;
}

.table-bordered {
    border-color: #dee2e6;
}

.table-bordered thead th {
    border-bottom-width: 2px;
}

.pagination-wrapper .pagination {
    margin-bottom: 0;
}
</style>
@endsection

@section('js')
<script>
$(document).ready(function() {
    // Dodatkowa logika jeśli potrzebna
});
</script>
@endsection