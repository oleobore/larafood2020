@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" class="active">Permissões do Perfil</a></li>
    </ol>
    <h1>Permissões do Perfil <b>{{ $profile->name }}</b> <a class="btn btn-dark" href="{{ route('profiles.permissions.available', $profile->id) }}">Adicionar Nova Permissão</a></h1>
@stop

@section('content')
    <div class="card">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Nome</th>
              <th width="50">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($permissions as $permission)
            <tr>
              <td>{{ $permission->name }}</td>
              <td style="width=10px">
                {{-- <a href="{{ route('details.plan.index', $plan->slug) }}" class="btn btn-primary">Detalhes</a> --}}
                <a href="{{ route('profiles.permission.detach', [$profile->id,$permission->id]) }}" class="btn btn-danger">Desvincular</a>
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