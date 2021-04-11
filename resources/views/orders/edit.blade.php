@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('orders.update', $order) }}">
            @csrf @method('PUT')

            @include('orders.component', [
                    'btn' => 'Edit'
                ])

        </form>
    </div>
@endsection
