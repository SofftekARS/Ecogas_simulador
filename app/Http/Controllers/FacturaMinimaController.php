<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FacturaMinima;
use Illuminate\Http\Request;

class FacturaMinimaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$factura_minimas = FacturaMinima::orderBy('id', 'desc')->paginate(10);

		return view('factura_minimas.index', compact('factura_minimas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('factura_minimas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$factura_minima = new FacturaMinima();

		$factura_minima->categoria = $request->input("categoria");
        $factura_minima->porcentaje = $request->input("porcentaje");

		$factura_minima->save();

		return redirect()->route('factura_minimas.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$factura_minima = FacturaMinima::findOrFail($id);

		return view('factura_minimas.show', compact('factura_minima'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$factura_minima = FacturaMinima::findOrFail($id);

		return view('factura_minimas.edit', compact('factura_minima'));
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
		$factura_minima = FacturaMinima::findOrFail($id);

		$factura_minima->categoria = $request->input("categoria");
        $factura_minima->porcentaje = $request->input("porcentaje");

		$factura_minima->save();

		return redirect()->route('factura_minimas.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$factura_minima = FacturaMinima::findOrFail($id);
		$factura_minima->delete();

		return redirect()->route('factura_minimas.index')->with('message', 'Item deleted successfully.');
	}

}
