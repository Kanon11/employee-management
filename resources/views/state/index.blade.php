@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">States</h1>
    </div>

    <div class="card">
        @if (Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif

        <div class="card-header">

            <div class="row">
                <div class="col-6">
                    <form method="GET" action="{{route('state.index')}}">
                        <div class="row align-items-center">
                            <div class="col">
                                <input type="search" name="search" class="form-control mb-2" id="autoSizingInput"
                                    placeholder="name">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <a href="{{ route('state.create') }}" class="float-right btn btn-primary">Create</a>
                </div>
            </div>

        </div>


        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Country-Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($states as $state)
                        <tr>
                            <td>{{ $state->id }}</td>
                            <td>{{ $state->country->country_code }}</td>
                            <td>{{ $state->name }}</td>
                            <td>
                                <a href="{{ route('state.edit', $state->id) }}" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
