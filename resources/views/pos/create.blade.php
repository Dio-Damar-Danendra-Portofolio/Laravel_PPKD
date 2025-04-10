@extends('layouts.inc.main')
@section('title', $title)
@section('content')
<section class="section">
    <form action="{{ route('pos.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Select Categories</h5>
                        <div class="mt-2" align="right">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                        </div>
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
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-primary add-row">Add to Cart</button>
                            </div>
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
                            <th>Photo</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Grand Total</th>
                                <td colspan="3">
                                    <span class="grandtotal"></span>
                                    <input type="hidden" class="form-control" name="grandtotal" id="grandtotal" readonly>
                                </td>
                            </tr>
                        </tfoot>
                       </table>
                       <div class="mt-3">
                            <button type="submit" class="btn btn-success">Confirm Order</button>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</section>
@endsection
