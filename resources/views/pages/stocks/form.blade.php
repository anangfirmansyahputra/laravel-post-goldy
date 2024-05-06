@extends('layouts.app')

@section('title', 'Branch Create')

@push('style')
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
  <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Advanced Forms</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Forms</a></div>
          <div class="breadcrumb-item">Stock</div>
        </div>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            @include('layouts.alert')
          </div>
        </div>
        <h2 class="section-title">Stock</h2>


        <div class="card">
          <form
            action="{{ isset($stock) ? route('stocks.update', ['id' => request()->route('id'), 'stock' => $stock->id]) : route('stocks.store', ['id' => request()->route('id')]) }}"
            enctype="multipart/form-data" method="POST">
            @csrf
            @if (isset($stock))
              @method('PUT')
            @endif
            <div class="card-header">
              <h4>Input Text</h4>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="product_id">Product</label>
                <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
                  <option value="">Pilih product</option>
                  @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                  @endforeach
                </select>
                @error('product_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                  <option value="IN">IN</option>
                  <option value="OUT">OUT</option>
                </select>
                @error('type')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Stock</label>
                <input type="number" placeholder="0" value="{{ isset($stock) ? $stock->stock : old('stock') }}"
                  class="form-control @error('stock')
                                is-invalid
                            @enderror"
                  name="stock">
                @error('stock')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>


            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>

      </div>
    </section>
  </div>
@endsection

@push('scripts')
@endpush
