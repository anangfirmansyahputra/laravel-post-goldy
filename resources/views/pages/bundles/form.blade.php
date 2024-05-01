@extends('layouts.app')

@section('title', 'Bundle Create')

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
          <div class="breadcrumb-item">Bundle</div>
        </div>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            @include('layouts.alert')
          </div>
        </div>
        <h2 class="section-title">Bundle</h2>


        <div class="card">
          <form action="{{ isset($bundle) ? route('bundles.update', $bundle->id) : route('bundles.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($bundle))
              @method('PUT')
            @endif
            <div class="card-header">
              <h4>Input Text</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Name</label>
                <input type="text" value="{{ $bundle->name ?? old('name') }}"
                  class="form-control @error('name')
                                is-invalid
                            @enderror"
                  name="name">
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label>Description</label>
                <input type="text" value="{{ $bundle->description ?? old('description') }}"
                  class="form-control @error('description')
                                is-invalid
                            @enderror"
                  name="description">
                @error('description')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label>Discount Percent</label>
                <input type="number" value="{{ $bundle->discount_percent ?? old('discount_percent') }}"
                  class="form-control @error('discount_percent')
                                is-invalid
                            @enderror"
                  name="discount_percent">
                @error('discount_percent')
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
