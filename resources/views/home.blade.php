@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Records') }}</div>

                <div class="card-body">
                    {{-- <h3>{{ dd($drums) }}</h3> --}}
                    @foreach ($drums as $drum)
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col">
                                <p>Drums <strong class="h4">{{ $drum->count_drum }}</strong></p>
                            </div>
                            <div class="col">
                                <p>Full <strong class="h4">{{ $drum->drum_full }}</strong></p>
                            </div>
                            <div class="col">
                                <p>Empty <strong class="h4">{{ $drum->drum_empty }}</strong></p>
                            </div>
                            <div class="col">
                                <p>Borrowed <strong class="h4">{{ $drum->drum_borrow }}</strong></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
