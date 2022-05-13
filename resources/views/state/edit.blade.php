@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update State</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update') }}
                        <a href="{{ route('state.index') }}" class="float-right btn btn-primary">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('state.update', $state->id) }}">
                            @csrf
                            @method("PUT")
                            <div class="row mb-3">
                                <label for="country_code"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                                <div class="col-md-6">

                                    <select name="country_id" class="form-control" aria-label="Default select example">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" {{$country->id==$state->country_id?'Selected':''}}>{{ $country->name }}</option>
                                        @endforeach

                                    </select>

                                    @error('country_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', $state->name) }}" required>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('state.destroy', $state->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete {{ $state->name }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
