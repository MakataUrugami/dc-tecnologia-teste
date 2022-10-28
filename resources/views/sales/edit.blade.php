@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
      @endif
      <div class="card">
        <div class="card-header">
        Vendas
        <a href="{{route('sales.index')}}">Voltar</a>
      </div>
        <div class="card-body">
          <div class="form-group">
            <h1>Editar Venda</h1>
            <form method="post" action="{{route('sales.update', $sale->id)}}">
              @csrf
              @method('PUT')
                <input type="text" name="saleClientName" class="form-control @error('saleClientName') is-invalid @enderror" id="saleClientName" placeholder="Nome do cliente:" value="{{$sale->saleClientName}}">
                @error('saleClientName')
                  <div class="invalid-feedback">{{$message}}</div><br>
                @enderror
                <textarea type="text" name="saleProducts" class="form-control @error('saleProducts') is-invalid @enderror" id="saleProducts" placeholder="Itens da venda:" rows="4" cols="50">{{$sale->saleProducts}}</textarea>
                @error('saleProducts')
                  <div class="invalid-feedback">{{$message}}</div><br>
                @enderror
                <input type="number" name="saleTotalPrice" class="form-control @error('saleTotalPrice') is-invalid @enderror" id="saleTotalPrice" placeholder="Valor total da venda R$:" value="{{$sale->saleTotalPrice}}">
                @error('saleTotalPrice')
                  <div class="invalid-feedback">{{$message}}</div><br>
                @enderror
                <input type="number" name="saleParcelNumber" class="form-control @error('saleParcelNumber') is-invalid @enderror" id="saleParcelNumber" placeholder="Quantidade de parcelas:" value="{{$sale->saleParcelNumber}}">
                @error('saleParcelNumber')
                  <div class="invalid-feedback">{{$message}}</div><br>
                @enderror
                <button type="submit">Atualizar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection