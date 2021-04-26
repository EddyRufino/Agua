@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('reloads.store') }}">
            @csrf

            @include('reloads.component', [
                    'btn' => 'Save',
                    'order' => new App\Reload
                ])

        </form>
    </div>
@endsection
