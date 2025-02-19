@extends('layouts.innerpages')

@section('template_title', 'Links')

@section('content')
    @include('partials.mainsite_pages.return_function')

    <div class="container mt-4">
        <div class="card shadow-lg p-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Links</h2>
                <a href="{{ route('links.create') }}" class="btn btn-primary">Add New Link</a>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Link</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($links as $link)
                            <tr>
                                <td><a href="{{ $link->link }}" target="_blank">{{ $link->link }}</a></td>
                                <td>{{ $link->description }}</td>
                                <td>
                                    <span class="badge {{ $link->status ? 'bg-success' : 'bg-danger' }}">
                                        {{ $link->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('links.edit', $link->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('links.destroy', $link->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer text-center">
                <small>&copy; {{ date('Y') }} Your Company Name</small>
            </div>
        </div>
    </div>
@endsection
