<?php

namespace App\Http\Controllers\UserAuth;

use App\Stakeholder;
use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'institucion' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'institucion' => $data['institucion'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function createcliente(Request $request)
    {
        //dd($request);
        $new_cliente = new Cliente;

        //$new_cliente -> orgnzs() -> associate($orgnz);
        $new_cliente->cliente      = $request->cliente ;
        $new_cliente->replegal= $request->replegal;
        $new_cliente->ruc       = $request->ruc;
        $new_cliente->telf        = $request->telf;
        $new_cliente->email        = $request->email;
        $new_cliente->dir        = $request->dir;



        $new_cliente -> save();

        /*return Cliente::create([
            'cliente' => $request['cliente'],
            'replegal' => $request['replegal'],
            'ruc' => $request['ruc'],
            'telf' => $request['telf'],
            'email' => $request['email'],
            'dir' => $request['dir'],

        ]);*/
        return redirect(url('user/home'));
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

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('user.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('user');
    }
}
