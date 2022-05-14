@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Departments</h1>
    </div>

    <div class="card">
        @if (Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif

        <div class="card-header">

            <div class="row">
                <div class="col-6">
                    <form method="GET" action="{{route('department.index')}}">
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
                    <a href="{{ route('department.create') }}" class="float-right btn btn-primary">Create</a>
                </div>
            </div>

        </div>


        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>{{ $department->name }}</td>
                            <td>
                                <a href="{{ route('department.edit', $department->id) }}" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
