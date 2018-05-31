<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelefonesController extends Controller {

    public function store(\App\Telefone $telefone) {
        try {
            $telefone->save();
        } catch (\Exception $e) {
            return "Erro" . $e->getMessage();
        }
    }

}
