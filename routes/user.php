<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    //dd($users);
    $clientes = DB::table('clientes')->select()->where('usuarioid',Auth::user()->id)->get(0);
    //dd($clientes);
    return view('user.home')->with(['clientes' => $clientes ]);
})->name('home');

Route::get('/crearcliente', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    //dd($users);

    $clientes = DB::table('clientes')->select()->where('usuarioid',Auth::user()->id)->get(0);

    return view('user.crearcliente')->with(['clientes' => $clientes ]);
})->name('crearcliente');

Route::get('/verproyecto/{clienteid}', function ($clienteid) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    //dd($users);
    $clientes = DB::table('clientes')->select()->where('usuarioid',Auth::user()->id)->get(0);
    $proyectos = DB::table('proyectos')->select()->where('clienteid',$clienteid)->get(0);

    return view('user.verproyecto')->with(['clienteid'=>$clienteid, 'proyectos' => $proyectos, 'clientes'=>$clientes]);
})->name('crearcliente');


Route::get('/crearproyecto/{clienteid}', function ($clienteid) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    //dd($users);
    $clientes = DB::table('clientes')->select()->where('usuarioid',Auth::user()->id)->get(0);
    return view('user.crearproyecto')->with(['clienteid'=>$clienteid, 'clientes'=>$clientes]);
})->name('crearproyecto');

Route::get('/crearstakeholder/{usuarioid}', function ($usuarioid) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    //dd($users);
    $clientes = DB::table('clientes')->select()->where('usuarioid',Auth::user()->id)->get(0);
    return view('user.crearstakeholder')->with(['clientes'=>$clientes, 'usuarioid'=>$usuarioid]);
})->name('crearstakeholder');

Route::get('/crearhistoria/{usuarioid}', function ($usuarioid) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    //dd($users);
    $clientes = DB::table('clientes')->select()->where('usuarioid',Auth::user()->id)->get(0);
    return view('user.crearhistoria')->with(['clientes'=>$clientes, 'usuarioid'=>$usuarioid]);
})->name('crearstakeholder');

Route::get('/verstakeholder/{usuarioid}', function ($usuarioid) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    //dd($users);
    $clientes = DB::table('clientes')->select()->where('usuarioid',Auth::user()->id)->get(0);
    $stakeholders = DB::table('stakeholders')->select()->where('userid',Auth::user()->id)->get(0);
    return view('user.verstakeholder')->with(['clientes'=>$clientes, 'usuarioid'=>$usuarioid, 'stakeholders'=>$stakeholders]);
})->name('crearstakeholder');

Route::post('/crear_cliente/{userid}', 'ClienteController@create')->name('crear_cliente');

Route::post('/crear_proyecto/{clienteid}', 'ClienteController@createproyecto')->name('crear_proyecto');

Route::post('/crear_stakeholder/{userid}', 'ClienteController@crearstakeholder')->name('crear_stakeholder');

Route::post('/crear_historia', 'ClienteController@crearhistoria')->name('crear_historia');

