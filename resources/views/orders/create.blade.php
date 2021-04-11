@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

            @include('orders.component', [
                    'btn' => 'Save',
                    'order' => new App\Order
                ])

        </form>
    </div>
@endsection
