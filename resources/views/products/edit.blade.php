@extends('layouts.inc.main')
@section('title', $title)
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5>{{ $title ?? '' }}</h5>
                        <div class="mt-2" align="right">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                        </div>
                        <form action="{{ route('products.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                @if($edit->product_photo)
                                    <img src="{{ asset('storage/' . $edit->product_photo) }}" alt="{{ $edit->product_name }}" width="200">
                                @else
                                    <img src="" alt="{{ $edit->product_name }}" width="200">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="product_name" class="col-form-label">Product Name: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name" required value="{{ $edit->product_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="product_price" class="col-form-label">Product Price: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Enter Product Price" required value="{{ $edit->product_price }}">
                            </div>
                            <div class="mb-3">
                                <label for="product_description" class="col-form-label">Product Description: </label>
                                <input type="text" class="form-control" name="product_description" id="product_description" placeholder="Enter Product Description" value="{{ $edit->product_description }}">
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="col-form-label">Product Category: <span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id">
                                    <option value="">Select One</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $edit->category_id == $category->id ? 'selected' : ''}}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="product_photo" class="col-form-label">Product Photo: </label>
                                <input type="file" name="product_photo" id="product_photo">
                            </div>
                            <div class="mb-3">
                                <label for="is_active" class="col-form-label">Status: <span class="text-danger">*</span></label>
                                <input type="radio" name="is_active" id="is_active" value="1" {{ $edit->product_id == $edit->product_status ? 'checked' : ''}}> Publish
                                <input type="radio" name="is_active" id="is_active" value="0" {{ $edit->product_id == $edit->product_status ? 'checked' : ''}}> Draft
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
