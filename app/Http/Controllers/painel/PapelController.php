<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Papel;
use App\Permissao;

class PapelController extends Controller
{
    /**
     * posso verificar se não há nomes iguais
     * 
     */
    public function index()
    {
      $registros = Papel::all();
      return view('painel.administrador.papel.listarPapel',compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.administrador.papel.criarPapel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $papel = Papel::where('nome',$request['nome'])->get()->first();
        if($papel){
            return redirect()->route('papeis.index');
        }
        if($request['nome'] && $request['nome'] != "admin"){

          $request['nome'] = strtolower($request['nome']);

          Papel::create($request->all());

          return redirect()->route('papeis.index');
        }

      return redirect()->back();
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
        if(Papel::find($id)->nome == "admin"){
          return redirect()->route('papeis.index');
      }

      $registro = Papel::find($id);

      return view('painel.administrador.papel.editar',compact('registro'));
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
         
         $request['nome'] = strtolower($request['nome']);
         
         if(Papel::find($id)->nome == "admin"){
          return redirect()->route('papeis.index');
         }
         if($request['nome'] && $request['nome'] != "admin"){
             
             Papel::find($id)->update($request->all());
         }

        return redirect()->route('papeis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(Papel::find($id)->nome == "admin"){
        return redirect()->route('papeis.index');
      }

      Papel::find($id)->delete();
      return redirect()->route('papeis.index');
    }

    public function permissoes($id)
    {
        $papel = Papel::find($id);
        $permissao = Permissao::all();
        return view('painel.administrador.papel.permissao', compact('papel','permissao'));

    }

     public function permissoesStore(Request $request, $id_papel)
    {
        $papel = Papel::find($id_papel);
        $dados = $request->all();
        $permissoes = Permissao::whereIn('id',$dados)->get();
        foreach ($permissoes as $permissao) {
            $papel->adicionaPermissao($permissao);
        }
        return redirect()->back();
    }

     public function permissoesDestroy($id_papel, $id_permissao)
    {
        $papel = Papel::find($id_papel);
        $permissao = Permissao::find($id_permissao);
        $papel->removePermissao($permissao);
        return redirect()->back();
    }

}
