@extends('app')

@section('content')
    @include('components.header')
    @include('admin.components.menu')

    <section class="products">
        <div class="container">
            <div class="row">
                <div class="col-xs">
                    <div class="wrapper">
                        <h1>Products</h1>
                        <a class="btn btn-primary" href="{{ route('admin.products.add') }}">Add Product</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-xs col-md-4">
                        <div class="item">
                            <img class="img-responsive mw-100" src="{{ asset('products/images/' . $product->file) }}" />
                            <h4>{{ $product->name }}</h4>
                            <span>{{ $product->price . ' RON' }}</span>
                            <span>{{ $product->nr }}</span>
                            <a class="btn btn-primary" href="{{ route('admin.products.edit', ['product' => $product->id]) }}">Edit</a>
                            <a class="btn btn-danger delete-btn" data-id="{{ $product->id }}">Delete</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="modal" tabindex="-1" role="dialog" id="delete-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want to delete this product?</p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary yes-btn">Yes</a>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('content-scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            $('.delete-btn').on('click', function() {
                var id;

                $('#delete-modal').modal('show');
                id = $(this).attr('data-id');
                $('.yes-btn').prop('href', '{{ route('admin.products.delete') }}/' + id);
            });
        });
    </script>
@endpush