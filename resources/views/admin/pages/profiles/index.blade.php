@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" class="active">Perfis</a></li>
    </ol>
    <h1>Perfis <a class="btn btn-dark" href="{{ route('profiles.create') }}">Add</a></h1>
@stop

@section('content')
    <div class="card">
      <div class="card-header">
        <form action="{{ route('profiles.search') }}" method="post" class="form form-inline">
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
              <th width="270">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($profiles as $profile)
            <tr>
              <td>{{ $profile->name }}</td>
              <td style="width=50px">
                {{-- <a href="{{ route('details.plan.index', $plan->slug) }}" class="btn btn-primary">Detalhes</a> --}}
                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Editar</a>
                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning">Ver</a>
                <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i></a>
                <a href="{{ route('profiles.plans', $profile->id) }}" class="btn btn-info"><i class="fas fa-list-alt"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        @if (isset($filters))
          {!! $profiles->appends($filters)->links() !!}
        @else
          {!! $profiles->links() !!}
        @endif
      </div>
    </div>
@stop