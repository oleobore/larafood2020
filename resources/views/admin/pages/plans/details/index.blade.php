@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
      <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->slug) }}">{{ $plan->name }}</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('details.plan.index', $plan->slug) }}" class="active">Detalhes</a></li>
    </ol>
    <h1>Detalhes do plano {{ $plan->name }} <a class="btn btn-dark" href="{{ route('details.plan.create', $plan->slug) }}">Add</a></h1>
@stop

@section('content')
    <div class="card">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Nome</th>
              <th width="150">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($details as $detail)
            <tr>
              <td>{{ $detail->name }}</td>
              <td style="width=50px">
                <a href="{{ route('details.plan.edit', [$plan->slug, $detail->id]) }}" class="btn btn-info">Editar</a>
                <a href="{{ route('details.plan.show', [$plan->slug,$detail->id]) }}" class="btn btn-warning">Ver</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        @if (isset($filters))
          {!! $details->appends($filters)->links() !!}
        @else
          {!! $details->links() !!}
        @endif
      </div>
    </div>
@stop