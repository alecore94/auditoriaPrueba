<div class="form-group {{ $errors->has('marca') ? 'has-error' : ''}}">
    <label for="marca" class="control-label">{{ 'Marca' }}</label>
    <input class="form-control" name="marca" type="text" id="marca" value="{{ isset($automovil->marca) ? $automovil->marca : ''}}" >
    {!! $errors->first('marca', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('modelo') ? 'has-error' : ''}}">
    <label for="modelo" class="control-label">{{ 'Modelo' }}</label>
    <input class="form-control" name="modelo" type="text" id="modelo" value="{{ isset($automovil->modelo) ? $automovil->modelo : ''}}" >
    {!! $errors->first('modelo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('anioModelo') ? 'has-error' : ''}}">
    <label for="anioModelo" class="control-label">{{ 'Aniomodelo' }}</label>
    <input class="form-control" name="anioModelo" type="date" id="anioModelo" value="{{ isset($automovil->anioModelo) ? $automovil->anioModelo : ''}}" >
    {!! $errors->first('anioModelo', '<p class="help-block">:message</p>') !!}
</div>
 
  <!--  <label name="user_id" type="text" id="user_id" value="{{ auth()->id() }}" > -->


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
