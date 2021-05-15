@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-body">
            @include('partials.search-report', [
                    'title' => 'Reporte Pedidos',
                    'link' => 'report.agua'
                ])
        </div>
    </div>
@endsection
