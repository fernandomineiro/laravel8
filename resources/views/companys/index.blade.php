@extends('companys.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Teste</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('companys.create') }}"> Criar nova empresa</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>N°</th>
            <th>Nome</th>
            <th>Razão</th>
            <th>CNPJ</th>
            <th>endereco</th>
            <th>Telefone</th>
            <th>Email</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($companys as $company)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->nome }}</td>
            <td>{{ $product->razao }}</td>
            <td>{{ $product->cnpj }}</td>
            <td>{{ $product->endereco }}</td>
            <td>{{ $product->telefone }}</td>
            <td>{{ $product->email }}</td>
            <td>
                <form action="{{ route('companys.destroy',$company->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('companys.show',$company->id) }}">Mostrar</a>
    
                    <a class="btn btn-primary" href="{{ route('companys.edit',$company->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $companys->links() !!}
      
@endsection