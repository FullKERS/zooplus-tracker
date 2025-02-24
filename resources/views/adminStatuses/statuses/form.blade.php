<div class="form-group {{ $errors->has('status_name') ? 'has-error' : ''}}">
    <label for="status_name" class="control-label">{{ 'Status Name' }}</label>
    <input class="form-control" name="status_name" type="text" id="status_name" value="{{ isset($status->status_name) ? $status->status_name : ''}}" >
    {!! $errors->first('status_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status_description') ? 'has-error' : ''}}">
    <label for="status_description" class="control-label">{{ 'Status Description' }}</label>
    <textarea class="form-control" rows="5" name="status_description" type="textarea" id="status_description" >{{ isset($status->status_description) ? $status->status_description : ''}}</textarea>
    {!! $errors->first('status_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
    <label for="order" class="control-label">{{ 'Order' }}</label>
    <input class="form-control" name="order" type="number" id="order" value="{{ isset($status->order) ? $status->order : ''}}" >
    {!! $errors->first('order', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    <label for="active" class="control-label">{{ 'Active' }}</label>
    <div class="radio">
    <label><input name="active" type="radio" value="1" {{ (isset($status) && 1 == $status->active) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="active" type="radio" value="0" @if (isset($status)) {{ (0 == $status->active) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
