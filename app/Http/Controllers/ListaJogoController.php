<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use DB;
use App\Models\ListaJogo;
use App\Models\user_list;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
class ListaJogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      protected $listaJogo;

    public function index()
    {
             if (! Gate::allows('admin')) {
            abort(403);
        }
            $listasJogos = ListaJogo::orderBy('datahora','desc')->get();
         return view('admin.gerenciarListas',['listasJogos'=>$listasJogos]);
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
               return view('admin.criarLista');
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
            'descricao' => 'required|string|max:190',
            'endereco' => 'required|string|max:190',
            'cidade' => 'required|string|max:190',
            'datahora' => 'required|date',
            'maxinscritos' => ['required', 'numeric'],
        ]);
        $inscritos = new user_list;


        $listaJogo = new ListaJogo;

        $listaJogo->fill($request->all());
              $listaJogo->inscritos = 0;
               $listaJogo->dataabertura = now();
               $listaJogo->listavisivel = 'S';
                $listaJogo->ativo = 'S';

                try{
        $listaJogo->save();

                }catch (\Throwable $e){
          //dd($e);
        }
        $msg = "Lista Incluída com sucesso.";


$user_list = user_list::with('user')->where('id_lista', $listaJogo->id)->get();

        return view('admin.alterarLista', [
            'listaJogo' => ListaJogo::findOrFail($listaJogo->id),
                        "user_list" => $user_list,
        ])->withMessage([$msg]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
                 if (! Gate::allows('admin')) {
            abort(403);
        }
$listaJogo = ListaJogo::find($id);

$user_list = user_list::with('user')->where('id_lista', $id)->get();

        return view("admin.alterarLista", [
            "listaJogo" => $listaJogo ,
            "user_list" => $user_list,
        ]);
    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function exibirLista($id)
{
             if (! Gate::allows('ativo')) {
            abort(403, 'Seu usuário está desativado. Contate a administração.');
        }
$listaJogo = ListaJogo::find($id);
if($listaJogo->ativo == 'S'){
$user_list = user_list::with('user')->where('id_lista', $id)->get();

        return view("user.exibirLista", [
            "listaJogo" => $listaJogo ,
            "user_list" => $user_list,
        ]);
    }else{
                 $msg = "A lista informada não está ativa.";
   return Redirect::route('dashboard')->withErrors([$msg]);

    }


}
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCodLista(Request $request)
{
             if (! Gate::allows('ativo')) {
            abort(403, 'Seu usuário está desativado. Contate a administração.');
        }
    $id = $request->codlista;
    $listaJogo = ListaJogo::where('codlista', $id)->first();
if (!$listaJogo) {
    $msg = "Código da lista não encontrado. Verifique o código e tente novamente.";
   return Redirect::route('dashboard')->withErrors([$msg]);
}else{
    $id = $listaJogo->id;

    return Redirect::route('exibirLista',$id);
}


    }


    public function inscrever($idLista,$idUser,Request $request)
{
             if (! Gate::allows('ativo')) {
            abort(403, 'Seu usuário está desativado. Contate a administração.');
        }
$listaJogo = ListaJogo::find($idLista);

   $msg = '';
   if($listaJogo->ativo == 'S'){
   if($listaJogo->inscritos < $listaJogo->maxinscritos){
        $listaJogo->inscritos++;



    $possuiBdu =$request->possuibdu;
    $classe =$request->classe;
    $id = $request->codlista;
    $idUser = Auth::user()->id;

        if (user_list::where('id_users', '=',$idUser)->where('id_lista', '=',$idLista)->count() == 0) {
                $inscricao = new user_list;

            $inscricao->ip = $request->ip();
            $inscricao->datainscricao = now();
            $inscricao->id_users = $idUser;
            $inscricao->id_lista = $idLista;
            $inscricao->fardamento = $possuiBdu;
            $inscricao->classe = $classe;


   // user found
           $listaJogo->save();
            $inscricao->save();
       $msg = "Inscrição realizada com sucesso!";
        }else{
            $msg = "Você já se inscreveu nessa lista!";
    }



}else{
    $msg = "Desculpe, a lista já está cheia.";
}
   }else{
        $msg = "Desculpe, essa lista está cancelada.";
   }


return Redirect::route('exibirLista',$idLista)->withErrors([$msg]);

    }

        public function removerInscricao($idLista,$idUser,Request $request)
{
             if (! Gate::allows('ativo')) {
            abort(403, 'Seu usuário está desativado. Contate a administração.');
        }
                        $msg = "Você não está inscrito.";

    $id = $request->codlista;

    $listaJogo = ListaJogo::find($idLista);

                 if (! Gate::allows('admin')) {
                    $idUser = Auth::user()->id;
                }

                 $inscricao = user_list::where('id_users', $idUser)->where('id_lista',$idLista);


   if($listaJogo->inscritos > 0 && $inscricao->count() > 0){
        $listaJogo->inscritos--;
            $listaJogo->save();
                $inscricao->delete();
                $msg = "Inscrição foi removida com sucesso.";

    }


return Redirect::route('exibirLista',$idLista)->withErrors([$msg]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     if (! Gate::allows('admin')) {
            abort(403);
        }
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




     if (! Gate::allows('admin')) {
            abort(403);
        }
             $request->validate([
            'descricao' => 'required|string|max:190',
            'endereco' => 'required|string|max:190',
            'cidade' => 'required|string|max:190',
            'datahora' => 'required|date',
            'maxinscritos' => ['required', 'numeric'],
        ]);

        $listaJogo = ListaJogo::find($id);
        try{
        $listaJogo->fill($request->all());
        $listaJogo->save();

        }catch (\Throwable $e){
          //dd($e);
        }
        $user_list = user_list::with('user')->where('id_lista', $id)->get();

        $user_list = user_list::with('user')->where('id_lista', $id)->get();


        return view('admin.alterarLista', [
            'listaJogo' => ListaJogo::findOrFail($id),
                        "user_list" => $user_list,
        ]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancelarJogo($id)
    {
             if (! Gate::allows('admin')) {
            abort(403);
        }



    $listaJogo = ListaJogo::find($id);
        $listaJogo->ativo = 'N';
        $listaJogo->save();
                 $msg = "Jogo cancelado com sucesso.";
            $listasJogos = ListaJogo::all();
         return view('admin.gerenciarListas',['listasJogos'=>$listasJogos]);

    }
}
