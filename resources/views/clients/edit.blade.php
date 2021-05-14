@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('clients.update', $client) }}">
        @csrf @method('PUT')

        @include('clients.component', [
                'btn' => 'Guardar'
            ])

    </form>
</div>
@endsection
