@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
      @endif
      <div class="card">
        <div class="card-header">
        Vendas
        <a href="{{route('sales.create')}}">Criar nova venda.</a>
      </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
            <tr>
            <th>Nome do Cliente</th>
            <th>Lista de Produtos</th>
            <th>Preço Total da Compra</th>
            <th>Parcelamento</th>
            <th></th>
            <th></th>
            </tr>
            </thead>
            <tbody>
              @foreach ($allSales as $s)
                <tr>
                  <td>{{$s->saleClientName}}</td>
                  <td>{{$s->saleProducts}}</td>
                  <td>R$ {{$s->saleTotalPrice}}.00</td>
                  <td>{{$s->saleParcelNumber}}x de R$ {{sprintf("%.2f", floatval(floatval($s->saleTotalPrice)/floatval($s->saleParcelNumber)))}}</td>
                  <td>
                   <a href="{{route('sales.edit', $s->id)}}" class="btn btn-sm btn-primary">Editar</a>
                  </td>
                  <td>
                  <form action="{{route('sales.destroy', $s->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                  </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection