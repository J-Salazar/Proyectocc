<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Historia;
use App\Proyecto;
use App\Stakeholder;
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $userid)
    {
        //
        $new_cliente = new Cliente;

        //$new_cliente -> orgnzs() -> associate($orgnz);
        $new_cliente->cliente      = $request->cliente ;
        $new_cliente->replegal= $request->replegal;
        $new_cliente->ruc       = $request->ruc;
        $new_cliente->telf        = $request->telf;
        $new_cliente->email        = $request->email;
        $new_cliente->dir        = $request->dir;
        $new_cliente->usuarioid    = $request->userid;


        $new_cliente -> save();
/*
        return Cliente::create([
            'cliente' => $request['cliente'],
            'replegal' => $request['replegal'],
            'ruc' => $request['ruc'],
            'telf' => $request['telf'],
            'email' => $request['email'],
            'dir' => $request['dir'],

        ]);*/
        return redirect(url('/user/home'));

    }

    public function createproyecto(Request $request, $clienteid)
    {
        //
        $new_proyecto = new Proyecto;

        //$new_cliente -> orgnzs() -> associate($orgnz);
        $new_proyecto->nombre = $request->nombre;
        $new_proyecto->descripcion = $request->descripcion;
        $new_proyecto->stakeholder = $request->stakeholder;
        $new_proyecto->equipo = $request->equipo;
        $new_proyecto->estado = $request->estado;
        $new_proyecto->clienteid = $request->clienteid;



        $new_proyecto->save();

        return redirect(url('/user/verproyecto/'.$clienteid));
    }


    protected function crearstakeholder(Request $request, $userid)
    {
        //dd($request);
        $new_stakeholder = new Stakeholder;

        $new_stakeholder->userid      = $request->userid ;
        $new_stakeholder->nombre = $request->nombre;
        $new_stakeholder->telefono       = $request->telefono;
        $new_stakeholder->direccion        = $request->direccion;
        $new_stakeholder->email        = $request->email;



        $new_stakeholder -> save();

        return redirect(url('user/home'));
    }

    protected function crearhistoria(Request $request)
    {
        //dd($request);
        $new_historia = new Historia;

        $new_historia->nombre      = $request->nombre ;
        $new_historia->descripcion = $request->descripcion;
        $new_historia->responsable    = $request->responsable;
        $new_historia->tiempoest        = $request->tiempoest;
        $new_historia->prioridad     = $request->prioridad;
        $new_historia->estado     = $request->estado;



        $new_historia -> save();

        return redirect(url('user/home'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
