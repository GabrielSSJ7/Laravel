@extends('template.app')


@section('content')

<div class="col-md-6 well">
    <form class="col-md-12" action="{{url("/pessoas/edit")}}" method="post">
        <input style="display: none" value="{{$pessoa->id}}" name="id">
        <div class="form-group col-md-12">
            <label for="nome" class="control-label"></label>
            <input type="text" name="nome" value="{{$pessoa->nome}}" placeholder="Nome" class="form-control" />
        </div>
        <div class="form-group col-md-4">
            <label for="ddd" class="control-label"></label>
            <input type="text" placeholder="ddd" name="ddd" value="{{$pessoa->ddd}}" class="form-control">
        </div>

        <div class="form-group col-md-8  ">
            <label for="telefone" class="control-label"></label>
            <input type="text" placeholder="telefone" name="telefone" value="{{$pessoa->telefone}}" class="form-control ">
        </div>
        <div class="col-md-12">
            <button style="float: right" class="btn btn-primary">Salvar</button>
        </div>
    </form>


</div>


@endsection
