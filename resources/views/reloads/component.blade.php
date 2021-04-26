<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                {{-- @include('clients.card-header', ['title' => 'Edit Order']) --}}
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="count_drum" class="col-md-4 col-form-label text-md-right font-weight-normal">Count Drums</label>

                    <div class="col-md-6">
                        <input id="count_drum" type="number" class="form-control @error('count_drum') is-invalid @enderror" name="count_drum" value="{{ old('count_drum', $order->count_drum) }}" required autocomplete="count_drum" autofocus>

                        @error('count_drum')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right font-weight-normal">Price Unit</label>

                    <div class="col-md-6">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $order->price) }}" required autocomplete="price" autofocus>

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ $btn }}
                        </button>
                        <a href="{{ route('home') }}" class="btn btn-secondary text-white">
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
