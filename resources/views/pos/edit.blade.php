@extends('layouts.inc.main')
@section('title', $title)
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Select Categories</h5>
                        <div class="mt-2" align="right">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                        </div>
                        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="category_id" class="col-form-label">Product Category: <span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id">
                                    <option value="">Select One</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="product_id" class="col-form-label">Product Name: <span class="text-danger">*</span></label>
                                <input type="text" name="product_id" id="product_id" class="col-form-label">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Select Categories</h5>
                        <div class="mt-2" align="right">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                        </div>
                        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
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
                                <label for="product_id" class="col-form-label">Product Name: <span class="text-danger">*</span></label>
                                <input type="text" name="product_id" id="product_id" class="col-form-label">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
