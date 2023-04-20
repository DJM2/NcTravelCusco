<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="form-group col-lg-4">
                {{ Form::label('nombre') }}
                {{ Form::text('nombre', $blog->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-lg-8">
                {{ Form::label('Subir imagen:') }}<br>
                {{ Form::file('img', $blog->img, ['class' => 'form-control-file' . ($errors->has('img') ? ' is-invalid' : '')]) }}
                {!! $errors->first('img', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-lg-12">
                <label for="">Etiquetas:</label><br>
                @foreach ($categorias as $categoria)
                    {!! Form::checkbox('categorias[]', $categoria, null) !!}
                    {{ $categoria}}
                @endforeach
            </div>
            
            <div class="form-group col-lg-12">
                {{ Form::label('resumen') }}
                {{ Form::text('resumen', $blog->descripcion, ['class' => 'form-control' . ($errors->has('resumen') ? ' is-invalid' : ''), 'placeholder' => 'Resumen']) }}
                {!! $errors->first('resumen', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-lg-12">
                {{ Form::label('detalle:') }}
                {{ Form::textarea('detalle', $blog->cuerpo, ['class' => 'ckeditor form-control' . ($errors->has('detalle') ? ' is-invalid' : ''), 'placeholder' => 'Detalle']) }}
                {!! $errors->first('detalle', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-lg-12">
                {{ Form::label('Status:') }}
                <div>
                    {{ Form::radio('status', 'publicado', $blog->status === 'publicado', ['id' => 'publicado']) }}
                    {{ Form::label('publicado', 'Publicado') }}
                </div>
                <div>
                    {{ Form::radio('status', 'borrador', $blog->status === 'borrador', ['id' => 'borrador']) }}
                    {{ Form::label('borrador', 'Borrador') }}
                </div>
                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            

        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
<script type="text/javascript">
    /* $(document).ready(function() {
        $('.ckeditor').ckeditor();
    }); */
    CKEDITOR.replace('.ckeditor', {
        extraPlugins: 'youtube',
        toolbar: [
            ['Youtube']
        ]
    });
</script>
