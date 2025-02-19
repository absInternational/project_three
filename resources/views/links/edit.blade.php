@extends('layouts.innerpages')

@section('template_title', 'Edit Link')

@section('content')
    @include('partials.mainsite_pages.return_function')

    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header">
                <h2 class="mb-0">Edit Link</h2>
            </div>

            <div class="card-body">
                <form action="{{ route('links.update', $link->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Link:</label>
                        <input type="url" name="link" class="form-control" value="{{ $link->link }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description:</label>
                        <textarea name="description" class="form-control" rows="3">{{ $link->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status:</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $link->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $link->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
