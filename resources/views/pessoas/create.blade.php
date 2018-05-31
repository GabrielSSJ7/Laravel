@extends('template.app')


@section('content')

<div class="col-md-12">
    <h3>Novo contato</h3>
</div>

<div class="col-md-6 well">
    <form class="col-md-12" action="{{url("/pessoas/store")}}" method="post">
        {{csrf_field()}}
        <div class="form-group col-md-12">
            <label for="nome" class="control-label"></label>
            <input type="text" name="nome" placeholder="Nome" class="form-control" />
        </div>
        <div class="form-group col-md-4">
            <label for="ddd" class="control-label"></label>
            <input type="text" placeholder="ddd" name="ddd" class="form-control">
        </div>

        <div class="form-group col-md-8  ">
            <label for="telefone" class="control-label"></label>
            <input type="text" placeholder="telefone" name="telefone" class="form-control ">
        </div>
        <div class="col-md-12">
            <button style="float: right" class="btn btn-primary">Salvar</button>
        </div>
    </form>


</div>

@endsection