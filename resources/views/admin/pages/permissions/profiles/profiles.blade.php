@extends('adminlte::page')

@section('title', "Perfis da Permissão {$permission->name}")

@section('content_header')
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}" class="active">Perfis da Permissão</a></li>
    </ol>
    <h1>Perfis da Permissão <b>{{ $permission->name }}</b></h1>
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
            @foreach ($profiles as $profile)
            <tr>
              <td>{{ $profile->name }}</td>
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
          {!! $profiles->appends($filters)->links() !!}
        @else
          {!! $profiles->links() !!}
        @endif
      </div>
    </div>
@stop