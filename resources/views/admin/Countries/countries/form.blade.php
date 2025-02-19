<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($country->name) ? $country->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('iso_code') ? 'has-error' : ''}}">
    <label for="iso_code" class="control-label">{{ 'Iso Code' }}</label>
    <input class="form-control" name="iso_code" type="text" id="iso_code" value="{{ isset($country->iso_code) ? $country->iso_code : ''}}" >
    {!! $errors->first('iso_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('flag_image') ? 'has-error' : ''}}">
    <label for="flag_image" class="control-label">{{ 'Flag Image' }}</label>
    <input class="form-control" name="flag_image" type="text" id="flag_image" value="{{ isset($country->flag_image) ? $country->flag_image : ''}}" >
    {!! $errors->first('flag_image', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
