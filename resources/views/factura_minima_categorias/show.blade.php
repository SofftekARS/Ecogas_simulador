@extends('layout')
@section('header')
<div class="page-header">
        <h1>FacturaMinimaCategorias / Show #{{$factura_minima_categorium->id}}</h1>
        <form action="{{ route('factura_minima_categorias.destroy', $factura_minima_categorium->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('factura_minima_categorias.edit', $factura_minima_categorium->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="categoria">CATEGORIA</label>
                     <p class="form-control-static">{{$factura_minima_categorium->categoria}}</p>
                </div>
                    <div class="form-group">
                     <label for="porcentaje">PORCENTAJE</label>
                     <p class="form-control-static">{{$factura_minima_categorium->porcentaje}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('factura_minima_categorias.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection