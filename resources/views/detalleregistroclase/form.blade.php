<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_detalle_registro_clase" class="form-label">{{ __('Iddetalleregistroclase') }}</label>
            <input type="text" name="IdDetalleRegistroClase" class="form-control @error('IdDetalleRegistroClase') is-invalid @enderror" value="{{ old('IdDetalleRegistroClase', $detalleregistroclase?->IdDetalleRegistroClase) }}" id="id_detalle_registro_clase" placeholder="Iddetalleregistroclase">
            {!! $errors->first('IdDetalleRegistroClase', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nota_evaluacion" class="form-label">{{ __('Notaevaluacion') }}</label>
            <input type="text" name="NotaEvaluacion" class="form-control @error('NotaEvaluacion') is-invalid @enderror" value="{{ old('NotaEvaluacion', $detalleregistroclase?->NotaEvaluacion) }}" id="nota_evaluacion" placeholder="Notaevaluacion">
            {!! $errors->first('NotaEvaluacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_registro_clases" class="form-label">{{ __('Idregistroclases') }}</label>
            <input type="text" name="IdRegistroClases" class="form-control @error('IdRegistroClases') is-invalid @enderror" value="{{ old('IdRegistroClases', $detalleregistroclase?->IdRegistroClases) }}" id="id_registro_clases" placeholder="Idregistroclases">
            {!! $errors->first('IdRegistroClases', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="numero_matricula" class="form-label">{{ __('Numeromatricula') }}</label>
            <input type="text" name="NumeroMatricula" class="form-control @error('NumeroMatricula') is-invalid @enderror" value="{{ old('NumeroMatricula', $detalleregistroclase?->NumeroMatricula) }}" id="numero_matricula" placeholder="Numeromatricula">
            {!! $errors->first('NumeroMatricula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_evaluacion" class="form-label">{{ __('Idevaluacion') }}</label>
            <input type="text" name="IdEvaluacion" class="form-control @error('IdEvaluacion') is-invalid @enderror" value="{{ old('IdEvaluacion', $detalleregistroclase?->IdEvaluacion) }}" id="id_evaluacion" placeholder="Idevaluacion">
            {!! $errors->first('IdEvaluacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_anotacion" class="form-label">{{ __('Idanotacion') }}</label>
            <input type="text" name="IdAnotacion" class="form-control @error('IdAnotacion') is-invalid @enderror" value="{{ old('IdAnotacion', $detalleregistroclase?->IdAnotacion) }}" id="id_anotacion" placeholder="Idanotacion">
            {!! $errors->first('IdAnotacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_asistencia" class="form-label">{{ __('Idasistencia') }}</label>
            <input type="text" name="IdAsistencia" class="form-control @error('IdAsistencia') is-invalid @enderror" value="{{ old('IdAsistencia', $detalleregistroclase?->IdAsistencia) }}" id="id_asistencia" placeholder="Idasistencia">
            {!! $errors->first('IdAsistencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>