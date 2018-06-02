<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
use App\Telefone;
use \Illuminate\Support\Facades\DB;


class PessoasController extends Controller {

    private $telefones_controller;
    private $pessoa;

    public function __construct(TelefonesController $telefones_controller) {
        $this->telefones_controller = $telefones_controller;
        $this->pessoa = new Pessoa();
    }

    public function index() {
        $listPessoas = \App\Pessoa::all();
        return view('pessoas.index', ["pessoas" => $listPessoas]);
    }

    public function novoView() {
        return view('pessoas.create');
    }

    public function editView($id) {
        return view("pessoas.edit", ["pessoa"=> $this->getPessoa($id)]);
    }

    public function store(Request $request) {

        $pessoa = \App\Pessoa::create($request->all());
        if ($request->ddd && $request->telefone) {
            $telefone = new \App\Telefone();
            $telefone->ddd = $request->ddd;
            $telefone->telefone = $request->telefone;
            $telefone->pessoa_id = $pessoa->id;
            $this->telefones_controller->store($telefone);
        }
        return redirect("/pessoas")->with("message", "Pessoa criada com sucesso!");
    }
    
    public function updateData(Request $request){

        $rules = [
            'nome' => 'required|max:13',
            'ddd' => 'required|min:2|max:3',
            'telefone' => 'required|max:10|min:9'
        ];
        
        $customMessages = [
            'required' => 'O campo :attribute é necessário',
            'max'=> 'O campo :attribute não pode ter mais que :max letras ',
            'min'=> 'O campo :attribute não pode ter menos que :min letras '
        ];
        
        $this->validate($request, $rules, $customMessages);

       $_pessoa = Pessoa::find($request->id);
       $_pessoa->nome = $request->nome;
       $_pessoa->save();

       $_telefone = Telefone::where('pessoa_id', $request->id)->update(['ddd' => $request->ddd, 'telefone' => $request->telefone]);
       return redirect('/pessoas');
    }

    public function deleteData($id){
        
        if(Pessoa::where('id', '=' , $id)->delete() != 0){
            return redirect("/pessoas");
        }

        
        
    }
    
    protected function getPessoa($id){
       return DB::table('pessoas')->where("pessoas.id", '=', $id)->
                join('telefones', 'pessoas.id', '=', 'telefones.pessoa_id')->
                first();
    }

  

}
