@include('partials.mainsite_pages.return_function')
@extends('layouts.innerpages')

@section('template_title')
    Check Price
@endsection

@section('content')
    <div class="container mt-4 updatePrice">
        @foreach ($data ?? [] as $item)
            @php
                $type = explode('*^', $item->order->type);
                $transport = explode('*^', $item->order->transport);
                $type_other = explode('*^', $item->order->typeOther);
                $check_other = in_array('other', $type);
            @endphp
            <div class="card" data-order-id="{{ $item->order_id ?? '' }}">
                <div class="card-header bg-primary text-white d-block">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Request for Order# {{ $item->order_id }}</h5>
                        </div>
                        <div class="col-md-3">
                            <div><strong>Origin:</strong> {{ $item->order->originzsc }}</div>
                            <div><strong>YMM:</strong> {{ $item->order->ymk }}</div>
                        </div>
                        <div class="col-md-3">
                            <div><strong>Destination:</strong> {{ $item->order->destinationzsc }}</div>
                        </div>
                        <div class="col-md-3">

                            <div><strong>Vehicle Type:</strong> {{ isset($type[0]) ? $type[0] : '-'  }}</div>
                            <div><strong>Trailer Type:</strong> {{ isset($transport[0]) ? ($transport[0] == 1 ? 'Open' : 'enclosed') : '-'  }}</div>
                        </div>
                    </div>
                </div>



                @if ($check_other && $item->other == null)
                    <div class="card-body">
                        <form action="{{ route('savePrice') }}" method="post">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $item->order_id }}">
                            @if ($check_other)
                                <div class="form-group">
                                    <label for="">{{ $type_other[0] }}</label>
                                    <textarea class="summernote" name="other" class="form-control">{!! $item->other !!}</textarea>
                                    <button type="submit" class="btn btn-success mt-3">Save</button>
                                </div>
                            @endif
                        </form>
                    </div>
                @elseif ($item->car == null || $item->suv == null || $item->pickup == null || $item->van == null)
                    <div class="card-body">
                        <form action="{{ route('savePrice') }}" method="post">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $item->order_id }}">

                            @if ($item->car == null)
                                <div class="form-group">
                                    <label for="">Car</label>
                                    <textarea class="summernote" name="car" class="form-control">{!! $item->car !!}</textarea>
                                    <button type="submit" class="btn btn-success mt-3">Save</button>
                                </div>
                            @endif
                            @if ($item->suv == null)
                                <div class="form-group">
                                    <label for="">SUV</label>
                                    <textarea class="summernote" name="suv" class="form-control">{!! $item->suv !!}</textarea>
                                    <button type="submit" class="btn btn-success mt-3">Save</button>
                                </div>
                            @endif
                            @if ($item->pickup == null)
                                <div class="form-group">
                                    <label for="">Pickup</label>
                                    <textarea class="summernote" name="pickup" class="form-control">{!! $item->pickup !!}</textarea>
                                    <button type="submit" class="btn btn-success mt-3">Save</button>
                                </div>
                            @endif
                            @if ($item->van == null)
                                <div class="form-group">
                                    <label for="">Van</label>
                                    <textarea class="summernote" name="van" class="form-control">{!! $item->van !!}</textarea>
                                    <button type="submit" class="btn btn-success mt-3">Save</button>
                                </div>
                            @endif
                        </form>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endsection

@section('extraScript')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                minHeight: 200,
                maxHeight: 500,
                focus: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onImageUpload: function(files) {
                        uploadImage(files[0]);
                    }
                }
            });
        });

        $('form').on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var formData = form.serialize();
            var orderId = form.find('input[name="order_id"]').val();

            $.ajax({
                url: "{{ route('savePrice') }}",
                method: "POST",
                data: formData,
                success: function(response) {
                    alert('Price saved successfully');
                    checkForNewEntries();
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while saving the price');
                }
            });
        });

        function uploadImage(file) {
            let data = new FormData();
            data.append("file", file);
            data.append("_token", "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('upload.image') }}",
                method: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('.summernote').summernote('insertImage', response.url);
                },
                error: function() {
                    alert('Error uploading image');
                }
            });
        }
    </script>
    <script>
        let existingIds = [];

        $(document).ready(function() {
            setInterval(checkForNewEntries, 30000);
        });

        function checkForNewEntries() {
            $.ajax({
                url: "{{ route('fetch.check.price') }}",
                method: "GET",
                data: {
                    existingIds: existingIds
                },
                success: function(response) {
                    console.log('response', response);
                    $('.updatePrice').html('');
                    $('.updatePrice').html(response);
                },
                error: function() {
                    console.error('Error fetching new entries');
                }
            });
        }
    </script>
@endsection
