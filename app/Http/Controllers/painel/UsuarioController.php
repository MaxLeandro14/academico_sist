<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Papel;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('painel.administrador.papel.index', compact('usuarios'));
    }

    public function papel($id)
    {
        $usuario = User::find($id);
        $papeis = Papel::all();
        return view('painel.administrador.papel.papel', compact('usuario','papeis'));

    }

     public function papelStore(Request $request, $id_user)
    {

        $usuario = User::find($id_user);
        if($usuario['codigo'] != "MASTER"){
         //// $dados = $request->all();
          $papeis = $request->input('papel_id');
          $papeis = Papel::whereIn('id', $papeis)->get();
          foreach ($papeis as $papel) {
                $usuario->adicionaPapel($papel);
                
          }
        }

       
        return redirect()->back();
    }

     public function papelDestroy($id_user, $id_papel)
    {
        $usuario = User::find($id_user);
        if($usuario['codigo'] != "MASTER"){
          $papel = Papel::find($id_papel);
          $usuario->removePapel($papel);
        }
        
        return redirect()->back();
    }

    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
