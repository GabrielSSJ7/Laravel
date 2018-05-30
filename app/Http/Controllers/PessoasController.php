<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PessoasController extends Controller
{
    public function index(){
        $listPessoas = \App\Pessoa::all();
        return view('pessoas.index', ["pessoas"=> $listPessoas]);
    }
    
}
