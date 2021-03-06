@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}" class="active">Permissões</a></li>
    </ol>
    <h1>Perfis <a class="btn btn-dark" href="{{ route('permissions.create') }}">Add</a></h1>
@stop

@section('content')
    <div class="card">
      <div class="card-header">
        <form action="{{ route('permissions.search') }}" method="post" class="form form-inline">
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
              <th width="250">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($permissions as $permission)
            <tr>
              <td>{{ $permission->name }}</td>
              <td style="width=50px">
                {{-- <a href="{{ route('details.plan.index', $plan->slug) }}" class="btn btn-primary">Detalhes</a> --}}
                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info">Editar</a>
                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning">Ver</a>
                <a href="{{ route('permissions.profiles', $permission->id) }}" class="btn btn-info"><i class="fas fa-address-book"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        @if (isset($filters))
          {!! $permissions->appends($filters)->links() !!}
        @else
          {!! $permissions->links() !!}
        @endif
      </div>
    </div>
@stop