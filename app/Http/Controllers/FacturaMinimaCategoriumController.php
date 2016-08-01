<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FacturaMinimaCategorium;
use Illuminate\Http\Request;

class FacturaMinimaCategoriumController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$factura_minima_categorias = FacturaMinimaCategorium::orderBy('id', 'desc')->paginate(10);

		return view('factura_minima_categorias.index', compact('factura_minima_categorias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('factura_minima_categorias.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$factura_minima_categorium = new FacturaMinimaCategorium();

		$factura_minima_categorium->Categoria = $request->input("Categoria");
        $factura_minima_categorium->Porcentaje = $request->input("Porcentaje");

		$factura_minima_categorium->save();

		return redirect()->route('factura_minima_categorias.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$factura_minima_categorium = FacturaMinimaCategorium::findOrFail($id);

		return view('factura_minima_categorias.show', compact('factura_minima_categorium'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$factura_minima_categorium = FacturaMinimaCategorium::findOrFail($id);

		return view('factura_minima_categorias.edit', compact('factura_minima_categorium'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$factura_minima_categorium = FacturaMinimaCategorium::findOrFail($id);

		$factura_minima_categorium->Categoria = $request->input("Categoria");
        $factura_minima_categorium->Porcentaje = $request->input("Porcentaje");

		$factura_minima_categorium->save();

		return redirect()->route('factura_minima_categorias.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$factura_minima_categorium = FacturaMinimaCategorium::findOrFail($id);
		$factura_minima_categorium->delete();

		return redirect()->route('factura_minima_categorias.index')->with('message', 'Item deleted successfully.');
	}

}
