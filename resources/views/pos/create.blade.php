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
                        <form action="{{ route('pos.store') }}" method="post" enctype="multipart/form-data">
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
                                <select name="product_id" id="product_id">
                                    <option value="">Select One</option>
                                    @foreach($products as $pro)
                                        <option value="{{ $pro->id }}">{{ $pro->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary add-row">Add to Cart</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
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
                        <h5>Order Basket</h5>
                       <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Harga</th>
                        </tr>
                        </thead>
                        <tbody>
                           <tr>
                            <th colspan="2">Subtotal</th>
                            <td colspan="2">
                                <input type="number" class="form-control" name="" id="">
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">Grand Total</th>
                            <td colspan="2">
                                <input type="number" class="form-control" name="" id="">
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Foto</th>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Harga</th>
                        </tr>
                        </tfoot>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
