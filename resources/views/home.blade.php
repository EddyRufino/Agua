@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Mis Bidones</div>

                <div class="card-body">
                    @foreach ($drums as $drum)
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col">
                                <p>Total <strong class="h4">{{ $drum->count_drum }}</strong></p>
                            </div>
                            <div class="col">
                                <p>Llenos <strong class="h4">{{ $drum->drum_full }}</strong></p>
                            </div>
                            <div class="col">
                                <p>Vacíos <strong class="h4">{{ $drum->drum_empty }}</strong></p>
                            </div>
                            <div class="col">
                                <p>Prestados <strong class="h4">{{ $drum->drum_borrow }}</strong></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
<br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Mi Dinero {{ today()->format('M Y') }}</div>

                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="col">
                            <p>Pagado <strong class="h4">S/. {{ $pay }}</strong></p>
                        </div>
                        <div class="col">
                            <p>Por Pagar <strong class="h4">S/. {{ $debt }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
