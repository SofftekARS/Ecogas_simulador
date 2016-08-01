@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> FacturaMinimaCategorias / Edit #{{$factura_minima_categorium->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('factura_minima_categorias.update', $factura_minima_categorium->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('categoria')) has-error @endif">
                       <label for="categoria-field">Categoria</label>
                    <input type="text" id="categoria-field" name="categoria" class="form-control" value="{{ is_null(old("categoria")) ? $factura_minima_categorium->categoria : old("categoria") }}"/>
                       @if($errors->has("categoria"))
                        <span class="help-block">{{ $errors->first("categoria") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('porcentaje')) has-error @endif">
                       <label for="porcentaje-field">Porcentaje</label>
                    <input type="text" id="porcentaje-field" name="porcentaje" class="form-control" value="{{ is_null(old("porcentaje")) ? $factura_minima_categorium->porcentaje : old("porcentaje") }}"/>
                       @if($errors->has("porcentaje"))
                        <span class="help-block">{{ $errors->first("porcentaje") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('factura_minima_categorias.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
