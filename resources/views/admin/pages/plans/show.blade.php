@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <h1>Detalhes do plano {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
     <div class="card-body">
      <ul>
       <li>
        <strong>Nome:</strong> {{ $plan->name }}
       </li>
       <li>
        <strong>URL:</strong> {{ $plan->slug }}
       </li>
       <li>
        <strong>Preço:</strong> R$ {{ number_format($plan->price, 2, ',', '.') }}
       </li>
       <li>
        <strong>Descrição:</strong> {{ $plan->description }}
       </li>
      </ul>

      @include('admin.includes.alerts')

      <form action="{{ route('plans.destroy',$plan->slug) }}" method="post">
       @csrf
       @method('DELETE')
       <button type="submit" class="btn btn-danger">Deletar o plano {{ $plan->name }}</button>
      </form>
     </div>
    </div>
@endsection