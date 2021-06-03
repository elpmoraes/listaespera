<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      protected $user;

    public function index()
    {
             if (! Gate::allows('admin')) {
            abort(403);
        }
            $user = User::all();
         return view('admin.gerenciarUsuarios',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             if (! Gate::allows('admin')) {
            abort(403);
        }
               return view('admin.criarUsuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             if (! Gate::allows('admin')) {
            abort(403);
        }
     $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'equipe' => $request->equipe,
            'telefone'=> $request->telefone,
        ]);

       // event(new Registered($user));

        //Auth::login($user);

        return redirect(RouteServiceProvider::HOME);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{

                 if (Auth::user()->id == $id || Gate::allows('admin')) {
                    return view('user.meusdados', [
            'user' => User::findOrFail($id)]);

        }else{

                abort(403);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                 if (Auth::user()->id == $id || Gate::allows('admin')) {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        return view('user.meusdados', [
            'user' => User::findOrFail($id)
        ]);
                }else{

                abort(403);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gerarSenha(Request $request, $id)
    {
               if (Auth::user()->id == $id || Gate::allows('admin')) {
        $user = User::find($id);
        $password = Hash::make($request->password);
        $user->password = $password;
        $user->save();
        return view('user.meusdados', [
            'user' => User::findOrFail($id)
        ]);
                }else{

                abort(403);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
