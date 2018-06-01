@extends("template.app")

@section("content")
    @foreach($pessoas as $pessoa)
    <div class="col-md-4">
        <div class="panel panel-info ">
            <div class="panel-heading">
                <p style="color:#444">{{$pessoa->nome}}<a style="float: right;" class="btn btn-primary" href="{{url("/pessoas/$pessoa->id/edit")}}"><i class="glyphicon glyphicon-pencil"></i></a></p>
                
                
            </div>
            <div class="panel-body">
                @foreach($pessoa->telefones as $telefone)
                <p><strong>Telefone:</strong> ({{$telefone->ddd}}){{$telefone->telefone}}</p>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach 

@endsection