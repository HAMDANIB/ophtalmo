
<div class="form-group {{ $errors->has('Lib_CorpsFr') ? 'has-error' : '' }}">
    <label for="Lib_CorpsFr" class="col-md-2 control-label">Lib  Corps Fr</label>
    <div class="col-md-10">
        <input class="form-control" name="Lib_CorpsFr" type="text" id="Lib_CorpsFr" value="{{ old('Lib_CorpsFr', optional($corps)->Lib_CorpsFr) }}" minlength="1" maxlength="50" required="true" placeholder="Enter lib  corps fr here...">
        {!! $errors->first('Lib_CorpsFr', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Lib_CorpsAr') ? 'has-error' : '' }}">
    <label for="Lib_CorpsAr" class="col-md-2 control-label">Lib  Corps Ar</label>
    <div class="col-md-10">
        <input class="form-control" name="Lib_CorpsAr" type="text" id="Lib_CorpsAr" value="{{ old('Lib_CorpsAr', optional($corps)->Lib_CorpsAr) }}" minlength="1" maxlength="250" required="true" placeholder="Enter lib  corps ar here...">
        {!! $errors->first('Lib_CorpsAr', '<p class="help-block">:message</p>') !!}
    </div>
</div>

