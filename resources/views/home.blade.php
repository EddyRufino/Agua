@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-md-12">
            <div class="row justify-content-center">
                {{-- Mis Bidones --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary font-weight-bold text-white">Mis Bidones</div>

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
            </div><br>
        </div>

        <div class="col col-md-12">
            <div class="row justify-content-center">
                {{-- Mi Dinero --}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary font-weight-bold text-white">Mi Dinero {{ today()->format('M Y') }}</div>

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
                {{-- Mis Recargas --}}
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header bg-primary font-weight-bold font-weight-bold text-white">Mis Recargas</div>

                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Cantidad Bidones</th>
                                            <th scope="col">Precio Unidad</th>
                                            <th scope="col">Total Pagado</th>
                                            <th scope="col">Fecha</th>
                                        </tr>
                                    </thead>
                                  <tbody>
                                    @foreach ($reloads as $reload)
                                        <tr>
                                            <td>{{ $reload->count_drum }}</td>
                                            <td>S/. {{ $reload->price }}</td>
                                            <td>S/. {{ $reload->price_total }}</td>
                                            <td>{{ $reload->created_at->format('d-M-Y') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    {{-- Mis Estadísticas --}}
                    <div class="card">
                        <div class="card-header bg-primary font-weight-bold font-weight-bold text-white">Mis Estadísticas</div>

                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                               {!! $chart->container() !!}

                                {!! $chart->script() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endpush
