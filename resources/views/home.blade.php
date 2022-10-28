@extends('layouts.app')

@section('content')
@guest
  Conecte-se ou cadastre-se como vendedor para ter acesso as vendas.
@else
<a href="{{route('sales.index')}}">Verificar Vendas</a>
@endguest
@endsection