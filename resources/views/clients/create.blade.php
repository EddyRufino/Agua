@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('clients.store') }}">
        @csrf

        @include('clients.component', [
                'btn' => 'Guardar',
                'client' => new App\Client
            ])

    </form>
</div>
@endsection
