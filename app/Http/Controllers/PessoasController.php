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

    public function editView($id) {
        return view("pessoas.edit", ["pessoa"=> $this->getPessoa($id)]);
    }
    
    protected function getPessoa($id){
       return DB::table('pessoas')->where("pessoas.id", '=', $id)->
                join('telefones', 'pessoas.id', '=', 'telefones.pessoa_id')->
                first();
    }

  

}
