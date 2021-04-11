@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-muted">List Orders</h3>
            <h5>
                <a href="{{ route('orders.create') }}" class="text-black-50">New</a>
            </h5>
        </div>
      <div class="row">
        @forelse ($orders as $order)
          <div class="col-xs-12 col-sm-6 col-md-4" >
            <div class="card mt-1">
              <header class="bg-primary">
                <br>
              </header>
              <div class="card-body">
                <h2 class="card-title">
                  <a href="#">
                    {{ $order->client->name }}
                  </a>
                </h2>
                <div class="card-subtitle">
                    <h5>
                        <span class="mr-4">Delivery {{ $order->delivery }}</span>
                        <span>{{ $order->updated_at->diffForHumans() }}</span>
                    </h5>
                    <h6>
                        <span class="mr-4">Pay {{ $order->pay }}</span>
                        <span>Debt {{ $order->debt }}</span>

                    </h6>
                </div>
                <hr>
              <div class="card-text">
                <a href="{{ route('orders.edit', $order) }}" class="mr-3" data-toggle="tooltip" data-placement="top" title="Editar">
                    @include('icons.icon-edit')
                </a>
                <form method="POST" action="{{ route('orders.destroy', $order) }}" style="display: inline;">
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
        {{ $orders->links() }}
      </div>
    </div>
@endsection
