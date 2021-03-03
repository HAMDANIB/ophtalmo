
<div class="form-group {{ $errors->has('code_wilaya') ? 'has-error' : '' }}">
    <label for="code_wilaya" class="col-md-2 control-label">Code Wilaya</label>
    <div class="col-md-10">
        <input class="form-control" name="code_wilaya" type="number" id="code_wilaya" value="{{ old('code_wilaya', optional($wilayas)->code_wilaya) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter code wilaya here...">
        {!! $errors->first('code_wilaya', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nom_wilaya') ? 'has-error' : '' }}">
    <label for="nom_wilaya" class="col-md-2 control-label">Nom Wilaya</label>
    <div class="col-md-10">
        <input class="form-control" name="nom_wilaya" type="text" id="nom_wilaya" value="{{ old('nom_wilaya', optional($wilayas)->nom_wilaya) }}" minlength="1" maxlength="255" required="true" placeholder="Enter nom wilaya here...">
        {!! $errors->first('nom_wilaya', '<p class="help-block">:message</p>') !!}
    </div>
</div>

