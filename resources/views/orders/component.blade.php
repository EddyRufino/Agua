<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                {{-- @include('clients.card-header', ['title' => 'Edit Order']) --}}
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="delivery" class="col-md-4 col-form-label text-md-right font-weight-normal">Delivery</label>

                    <div class="col-md-6">
                        <input id="delivery" type="text" class="form-control @error('delivery') is-invalid @enderror" name="delivery" value="{{ old('delivery', $order->delivery) }}" required autocomplete="delivery" autofocus>

                        @error('delivery')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="pay" class="col-md-4 col-form-label text-md-right font-weight-normal">Pay</label>

                    <div class="col-md-6">
                        <input id="pay" type="text" class="form-control @error('pay') is-invalid @enderror" name="pay" value="{{ old('pay', $order->pay) }}" required autocomplete="pay" autofocus>

                        @error('pay')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <input type="text" name="debt" value="{{ old('debt', $order->debt) }}" hidden>

                <div class="form-group row">
                    <label for="client_id" class="col-md-4 col-form-label text-md-right font-weight-normal">Client</label>

                    <div class="col-md-6">
                        <select class="form-control select2" name="client_id">
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}"
                                    {{ old('client_id', $order->client_id) == $client->id ? 'selected' : '' }}
                                    >{{ $client->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('client_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- Records --}}
                {{-- {{ dd(request()->routeIs('orders.edit')) }} --}}
                @if (request()->routeIs('orders.edit'))

                @else
                    <div class="form-group row">
                        <label for="drum_empty" class="col-md-4 col-form-label text-md-right font-weight-normal">drum_empty</label>

                        <div class="col-md-6">
                            <input id="drum_empty" type="text" class="form-control @error('drum_empty') is-invalid @enderror" name="drum_empty" value="{{ old('drum_empty', $order->drum_empty) }}"  autocomplete="drum_empty" autofocus>

                            @error('drum_empty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="drum_borrow" class="col-md-4 col-form-label text-md-right font-weight-normal">drum_borrow</label>

                        <div class="col-md-6">
                            <input id="drum_borrow" type="text" class="form-control @error('drum_borrow') is-invalid @enderror" name="drum_borrow" value="{{ old('drum_borrow', $order->drum_borrow) }}"  autocomplete="drum_borrow" autofocus>

                            @error('drum_borrow')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endif

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
