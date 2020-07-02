@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}" class="active">Planos</a></li>
    </ol>
    <h1>Planos <a class="btn btn-dark" href="{{ route('plans.create') }}">Add</a></h1>
@stop

@section('content')
    <div class="card">
      <div class="card-header">
        <form action="{{ route('plans.search') }}" method="post" class="form form-inline">
          @csrf
          <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
          <button type="submit" class="btn btn-dark">Pesquisar</button>
        </form>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Preço</th>
              <th width="270">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($plans as $plan)
            <tr>
              <td>{{ $plan->name }}</td>
              <td>R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
              <td style="width=50px">
                <a href="{{ route('details.plan.index', $plan->slug) }}" class="btn btn-primary">Detalhes</a>
                <a href="{{ route('plans.edit', $plan->slug) }}" class="btn btn-info">Editar</a>
                <a href="{{ route('plans.show', $plan->slug) }}" class="btn btn-warning">Ver</a>
                <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-warning"><i class="fas fa-address-book"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        @if (isset($filters))
          {!! $plans->appends($filters)->links() !!}
        @else
          {!! $plans->links() !!}
        @endif
      </div>
    </div>
@stop