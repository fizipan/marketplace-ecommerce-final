@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product Detail
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">{{ $product->name }}</h2>
            <p class="dashboard-subtitle">Product Details</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
            <div class="col-12 mt-2">
                <form action="{{ route('dashboard-product-update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') ?? $product->name }}">
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}">
                            @error('price')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="categories_id">Category</label>
                            <select name="categories_id" id="categories_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option {{ $category->id == $product->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories_id')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="editor">
                                {!! $product->description !!}
                            </textarea>
                            @error('description')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                        <button type="submit" name="save" class="btn btn-success btn-block py-2">Update
                            Product</button>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card my-4">
                    <div class="card-body">
                    <div class="row mt-2">
                        @foreach ($product->galleries as $gallery)
                        <div class="col-md-4 mb-3">
                            <div class="gallery-container">
                                <img src="{{ Storage::url($gallery->photos ?? '') }}" alt="" class="w-100">
                                <a href="{{ route('dashboard-product-gallery-delete', $gallery->id) }}" class="delete-gallery">
                                    <img src="/images/icon-delete.svg" alt="">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                            <form action="{{ route('dashboard-product-gallery-upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="products_id" value="{{ $product->id }}">
                                <input type="file" name="photos" id="file" style="display: none;" onchange="form.submit()">
                                <button type="button" class="btn btn-secondary btn-block py-2"
                                    onclick="thisFileUpload()">Add
                                Photo</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
    <script>
        function thisFileUpload() {
        document.getElementById('file').click();
        }
    </script>
@endpush