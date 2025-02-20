<div class="form-group {{ $errors->has('subcampaigns.*.subcampaign_name') ? 'has-error' : ''}}">
    <label for="subcampaign_name" class="control-label">{{ 'Subcampaign Name' }}</label>
    <input class="form-control" name="subcampaigns[0][subcampaign_name]" type="text" value="{{ old('subcampaigns[0][subcampaign_name]', isset($subcampaign->subcampaign_name) ? $subcampaign->subcampaign_name : '') }}">
    {!! $errors->first('subcampaigns.*.subcampaign_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('subcampaigns.0.country_id') ? 'has-error' : ''}}">
    <label for="country_id" class="control-label">{{ 'Country' }}</label>
    <select class="form-control" name="subcampaigns[0][country_id]" id="country_id">
        <option value="">Wybierz kraj</option>
        @foreach($countries as $country)
            <option value="{{ $country->id }}" {{ old('subcampaigns.0.country_id', $subcampaign->country_id) == $country->id ? 'selected' : '' }}>
                {{ $country->flag_image }} {{ $country->name }}
            </option>
        @endforeach
    </select>
    {!! $errors->first('subcampaigns.0.country_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('subcampaigns.*.order_number') ? 'has-error' : ''}}">
    <label for="order_number" class="control-label">{{ 'Order Number' }}</label>
    <input class="form-control" name="subcampaigns[0][order_number]" type="text" value="{{ old('subcampaigns[0][order_number]', isset($subcampaign->order_number) ? $subcampaign->order_number : '') }}">
    {!! $errors->first('subcampaigns.*.order_number', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('subcampaigns.*.quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="subcampaigns[0][quantity]" type="number" value="{{ old('subcampaigns[0][quantity]', isset($subcampaign->quantity) ? $subcampaign->quantity : '') }}">
    {!! $errors->first('subcampaigns.*.quantity', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('subcampaigns.*.status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="subcampaigns[0][status]" type="text" value="{{ old('subcampaigns[0][status]', isset($subcampaign->status) ? $subcampaign->status : '') }}">
    {!! $errors->first('subcampaigns.*.status', '<p class="help-block">:message</p>') !!}
</div>

<!-- Wybór kampanii nadrzędnej -->
<div class="form-group {{ $errors->has('campaign_id') ? 'has-error' : ''}}">
    <label for="campaign_id" class="control-label">{{ 'Parent Campaign' }}</label>
    <select class="form-control" name="campaign_id">
        <option value="">Wybierz kampanię</option>
        @foreach($campaigns as $campaign)
            <option value="{{ $campaign->id }}" {{ (old('campaign_id', isset($subcampaign->campaign_id) ? $subcampaign->campaign_id : '') == $campaign->id) ? 'selected' : '' }}>
                {{ $campaign->campaign_name }}
            </option>
        @endforeach
    </select>
    {!! $errors->first('campaign_id', '<p class="help-block">:message</p>') !!}
</div>

<!-- Przycisk do wysłania formularza -->
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

