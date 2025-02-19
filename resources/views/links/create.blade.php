@extends('layouts.innerpages')

@section('template_title', 'Add Link')

@section('content')
    @include('partials.mainsite_pages.return_function')

    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header">
                <h2 class="mb-0">Add New Link</h2>
            </div>

            <div class="card-body">
                <form action="{{ route('links.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Link:</label>
                        <input type="url" name="link" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description:</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
