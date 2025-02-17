<div class="form-group {{ $errors->has('subcampaign_name') ? 'has-error' : ''}}">
    <label for="subcampaign_name" class="control-label">{{ 'Subcampaign Name' }}</label>
    <input class="form-control" name="subcampaign_name" type="text" id="subcampaign_name" value="{{ isset($subcampaign->subcampaign_name) ? $subcampaign->subcampaign_name : ''}}" >
    {!! $errors->first('subcampaign_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('order_number') ? 'has-error' : ''}}">
    <label for="order_number" class="control-label">{{ 'Order Number' }}</label>
    <input class="form-control" name="order_number" type="text" id="order_number" value="{{ isset($subcampaign->order_number) ? $subcampaign->order_number : ''}}" >
    {!! $errors->first('order_number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($subcampaign->quantity) ? $subcampaign->quantity : ''}}" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($subcampaign->status) ? $subcampaign->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('campaign_id') ? 'has-error' : ''}}">
    <label for="campaign_id" class="control-label">{{ 'Campaign Id' }}</label>
    <input class="form-control" name="campaign_id" type="number" id="campaign_id" value="{{ isset($subcampaign->campaign_id) ? $subcampaign->campaign_id : ''}}" >
    {!! $errors->first('campaign_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
