@extends('layouts.front')

@section('title')
  Welcome to BAUHINIA
@endsection

@section('content')
    @include('layouts.inc.slider')

  <div class="py-5">
    <div class="container">
       <div class="row">
        <h2>Trending Products</h2>
        @foreach ($featured_products as $item)
          <div class="col-md-3 mt-3">
            <div class="card">
              <img src="{{ asset('assets/uploads/products/'.$item->image) }}" height="200px" width="250px" alt="Product Image">
              <div class="card-body">
                <h5>{{ $item->name }}</h5>
                <small>{{ $item->selling_price }}</small>
              </div>
            </div>
          </div>
        @endforeach
       </div>
    </div>
  </div>

  <div class="py-5">
    <div class="container">
       <div class="row">
        <h2>Popular Categorys</h2>
        @foreach ($popular_category as $item)
          <div class="col-md-3 mt-3">
            <a href="{{ url('category/'.$item->slug) }}">
            <div class="card">
                 <img src="{{ asset('assets/uploads/category/'.$item->image) }}" height="200px" width="250px" alt="Product Image">
                   <div class="card-body">
                     <h5>{{ $item->name }}</h5>
                       <p>{{ $item->meta_descrip }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
       </div>
    </div>
  </div>

@endsection
