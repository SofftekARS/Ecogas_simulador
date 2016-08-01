@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> FacturaMinimaCategorias
            <a class="btn btn-success pull-right" href="{{ route('factura_minima_categorias.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($factura_minima_categorias->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CATEGORIA</th>
                        <th>PORCENTAJE</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($factura_minima_categorias as $factura_minima_categorium)
                            <tr>
                                <td>{{$factura_minima_categorium->id}}</td>
                                <td>{{$factura_minima_categorium->categoria}}</td>
                    <td>{{$factura_minima_categorium->porcentaje}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('factura_minima_categorias.show', $factura_minima_categorium->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('factura_minima_categorias.edit', $factura_minima_categorium->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('factura_minima_categorias.destroy', $factura_minima_categorium->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $factura_minima_categorias->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection