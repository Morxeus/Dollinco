<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_reunion_apoderado" class="form-label">{{ __('Idreunionapoderado') }}</label>
            <input type="text" name="IdReunionApoderado" class="form-control @error('IdReunionApoderado') is-invalid @enderror" value="{{ old('IdReunionApoderado', $reunionApoderado?->IdReunionApoderado) }}" id="id_reunion_apoderado" placeholder="Idreunionapoderado">
            {!! $errors->first('IdReunionApoderado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="asistencia" class="form-label">{{ __('Asistencia') }}</label>
            <input type="text" name="Asistencia" class="form-control @error('Asistencia') is-invalid @enderror" value="{{ old('Asistencia', $reunionApoderado?->Asistencia) }}" id="asistencia" placeholder="Asistencia">
            {!! $errors->first('Asistencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="run_apoderado" class="form-label">{{ __('Runapoderado') }}</label>
            <input type="text" name="RunApoderado" class="form-control @error('RunApoderado') is-invalid @enderror" value="{{ old('RunApoderado', $reunionApoderado?->RunApoderado) }}" id="run_apoderado" placeholder="Runapoderado">
            {!! $errors->first('RunApoderado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_reunion" class="form-label">{{ __('Idreunion') }}</label>
            <input type="text" name="IdReunion" class="form-control @error('IdReunion') is-invalid @enderror" value="{{ old('IdReunion', $reunionApoderado?->IdReunion) }}" id="id_reunion" placeholder="Idreunion">
            {!! $errors->first('IdReunion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_malla" class="form-label">{{ __('Idmalla') }}</label>
            <input type="text" name="IdMalla" class="form-control @error('IdMalla') is-invalid @enderror" value="{{ old('IdMalla', $reunionApoderado?->IdMalla) }}" id="id_malla" placeholder="Idmalla">
            {!! $errors->first('IdMalla', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>