<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                {{-- @include('clients.card-header', ['title' => 'Edit Order']) --}}
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="delivery" class="col-md-4 col-form-label text-md-right font-weight-normal">Entrega</label>

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
                    <label for="pay" class="col-md-4 col-form-label text-md-right font-weight-normal">Bidones Pago</label>

                    <div class="col-md-6">
                        <input id="pay" type="number" class="form-control @error('pay') is-invalid @enderror" name="pay" value="{{ old('pay', $order->pay) }}" required autocomplete="pay" autofocus>

                        @error('pay')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <input type="text" name="debt" value="{{ old('debt', $order->debt) }}" hidden>

                <div class="form-group row">
                    <label for="client_id" class="col-md-4 col-form-label text-md-right font-weight-normal">Cliente</label>

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
                        <label for="drum_empty" class="col-md-4 col-form-label text-md-right font-weight-normal">Bidones Vacíos</label>

                        <div class="col-md-6">
                            <input id="drum_empty" type="number" class="form-control @error('drum_empty') is-invalid @enderror" name="drum_empty" value="0"  autocomplete="drum_empty" required autofocus>

                            @error('drum_empty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="drum_borrow" class="col-md-4 col-form-label text-md-right font-weight-normal">Bidones Prestados</label>

                        <div class="col-md-6">
                            <input id="drum_borrow" type="number" class="form-control @error('drum_borrow') is-invalid @enderror" name="drum_borrow" value="0"  autocomplete="drum_borrow" required autofocus>

                            @error('drum_borrow')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                @endif

                    <div class="form-group row">
                        <label for="drum_empty" class="col-md-4 col-form-label text-md-right font-weight-normal">Descripción</label>

                        <div class="col-md-6">
                           {{--  <input id="drum_empty" type="number" class="form-control @error('drum_empty') is-invalid @enderror" name="drum_empty" value="0"  autocomplete="drum_empty" required autofocus> --}}
                           <textarea name="description" cols="5" rows="3" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $order->description) }}">{{ $order->description }}</textarea>

                            @error('drum_empty')
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
                        <a href="{{ route('home') }}" class="btn btn-light text-dark">
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
