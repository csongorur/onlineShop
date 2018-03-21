@extends('app')

@section('content')
    <section class="shop-index">
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-xs col-md-4">
                        <a href="{{ route('products.show', ['id' => $product->id]) }}">
                            <div class="item">
                                <img class="img-responsive mw-100" src="{{ asset('products/images/' . $product->file) }}" />
                                <h4>{{ $product->name }}</h4>
                                <span>{{ $product->price . ' RON' }}</span>
                                <span>{{ $product->nr }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection