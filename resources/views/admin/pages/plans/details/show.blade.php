@extends('adminlte::page')

@section('title', "Detalhes do detalhe {$detail->name}")

@section('content_header')
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
      <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->slug) }}">{{ $plan->name }}</a></li>
      <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->slug) }}" >Detalhes</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('details.plan.edit', [$plan->slug, $detail->id]) }}" class="active">Detalhes</a></li>
    </ol>
    <h1>Detalhes do detalhe {{ $detail->name }}</h1>
@stop

@section('content')
    <div class="card">
      <div class="card-body">
        <ul>
          <li>
            <strong>Nome:</strong> {{ $detail->name }}
          </li>
        </ul>
      </div>
      <div class="card-footer">
        <form action="{{ route('details.plan.destroy',[$plan->slug, $detail->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Deletar o detalhe {{ $detail->name }}, do plano {{ $plan->name }}</button>
        </form>
      </div>

    </div>
@endsection