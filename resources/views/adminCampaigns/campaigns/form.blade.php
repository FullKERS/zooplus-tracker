<div class="form-group {{ $errors->has('campaign_name') ? 'has-error' : ''}}">
    <label for="campaign_name" class="control-label">{{ 'Campaign Name' }}</label>
    <input class="form-control" name="campaign_name" type="text" id="campaign_name" value="{{ isset($campaign->campaign_name) ? $campaign->campaign_name : ''}}" >
    {!! $errors->first('campaign_name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
