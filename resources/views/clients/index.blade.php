@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="text-muted">Mis Clientes</h3>
        <h5>
            <a href="{{ route('clients.create') }}" class="text-black-50">Nuevo</a>
        </h5>
    </div>
  <div class="row">
    @forelse ($clients as $client)
      <div class="col-xs-12 col-sm-6 col-md-4" >
        <div class="card mt-1">
          <header class="bg-primary">
            <br>
          </header>
          <div class="card-body">
            <h2 class="card-title">
              <a href="#">
                {{ $client->name }}
              </a>
            </h2>
            <div class="card-subtitle">
                <h5 class="d-flex align-items-center">
                    @include('icons.icon-phone')
                    <span class="ml-1">{{ $client->phone }}</span>
                </h5>
                <h6 class="d-flex align-items-center">
                    @include('icons.icon-address')
                    <span class="ml-1">{{ $client->address }}</span>
                </h6>
            </div>
            <hr>
          <div class="card-text">
            <a href="{{ route('clients.edit', $client) }}" class="mr-3" data-toggle="tooltip" data-placement="top" title="Editar">
                @include('icons.icon-edit')
            </a>
            <form method="POST" action="{{ route('clients.destroy', $client) }}" style="display: inline;">
                @csrf @method('DELETE')
                <button class="btn btn-xs btn-link p-0 m-0"
                  onclick="return confirm('¿Estás seguro de eliminarlo?')" data-toggle="tooltip" data-placement="top" title="Eliminar">

                    @include('icons.icon-delete')

                </button>
            </form>
          </div>

          </div>
        </div>
      </div>
    @empty
        <h1>No hay nada</h1>
    @endforelse
  </div>
  <div class="overflow-auto mt-1">
    {{ $clients->links() }}
  </div>
</div>
@endsection
