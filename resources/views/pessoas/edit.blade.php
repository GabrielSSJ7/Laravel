@extends('template.app')


@section('content')

<div class="col-md-6 well">
<!--    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif-->
    <form class="col-md-12" action="{{url("/pessoas/edit")}}" method="post">
        {{csrf_field()}}
       
        <input style="display: none" value="{{$pessoa->pessoa_id}}" name="id">
        <div class="form-group col-md-12 {{ $errors->has('nome') ? ' has-error' : '' }}">
        
            <label for="nome" class="control-label"></label>
            <input type="text" name="nome" value="{{$pessoa->nome}}" placeholder="Nome" class="form-control" />
             <small class="text-danger">{{ $errors->first('nome') }}</small>
        </div>
        <div class="form-group col-md-4 {{ $errors->has('ddd') ? ' has-error' : '' }}">
            <label for="ddd" class="control-label"></label>
            <input type="text" placeholder="ddd" name="ddd" value="{{$pessoa->ddd}}" class="form-control">
            <small class="text-danger">{{ $errors->first('ddd') }}</small>
        </div>

        <div class="form-group col-md-8  {{ $errors->has('telefone') ? ' has-error' : '' }}">
            <label for="telefone" class="control-label"></label>
            <input type="text" placeholder="telefone" name="telefone" value="{{$pessoa->telefone}}" class="form-control ">
            <small class="text-danger">{{ $errors->first('telefone') }}</small>
        </div>
        <div class="col-md-12">
        <a style="float:left; margin-bottom: 5px" class="btn btn-danger glyphicon glyphicon-trash"
         href="{{url("/pessoas/$pessoa->pessoa_id/delete")}}"></a>
            <button style="float: right" class="btn btn-primary">Salvar</button>
        </div>

    </form>


</div>


@endsection
