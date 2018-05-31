<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PessoasController extends Controller {
    
    private $telefones_controller;
    
    public function __construct(TelefonesController $telefones_controller) {
        $this->telefones_controller = $telefones_controller;
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
        if($request->ddd && $request->telefone){
            $telefone = new \App\Telefone();
            $telefone->ddd = $request->ddd;
            $telefone->telefone = $request->telefone;
            $telefone->pessoa_id = $pessoa->id;
            $this->telefones_controller->store($telefone);
        }
        return redirect("/pessoas")->with("message", "Pessoa criada com sucesso!");
    }

}
