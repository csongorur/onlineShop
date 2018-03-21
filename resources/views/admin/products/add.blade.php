@extends('app')

@section('content')
    @include('components.header')
    @include('admin.components.menu')

    <section class="products-add">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.products.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control" name="name" type="text" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="price" type="number" min="0" step="0.01" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="nr" type="number" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="file" type="file" />
                        </div>
                        <input type="submit" class="btn btn-primary" value="Add" />
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection