<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use COM;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['clientes']=Cliente::paginate(5);
        return view('clientes.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'Nombres'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Documento'=>'required|int',
            'Correo'=>'required|email'
        ];

        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);


        // $datosCliente = request()->all();
        $datosCliente = request()->except('_token');

        /* Si tuviera un archivo que subir
         *  if($request->hasFile('Foto')){
         * $datosCliente['Foto']=$request->file('Foto)->store('uploads','public');
         * 
         * }
         * 
         * */

        Cliente::insert($datosCliente);
        // return response()->json($datosCliente);
        return redirect('clientes')->with('mensaje','Cliente agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente=Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombres'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Documento'=>'required|int',
            'Correo'=>'required|email'
        ];

        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosCliente = request()->except(['_token','_method']);
        Cliente::where('id','=',$id)->update($datosCliente);

        $cliente=Cliente::findOrFail($id);
        // return view('clientes.edit', compact('cliente'));
        return redirect('clientes')->with('mensaje','El cliente ha sido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cliente::destroy($id);
        return redirect('clientes')->with('mensaje','El cliente ha sido eliminado');
    }
}
