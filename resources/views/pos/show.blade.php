@extends('layouts.inc.main')
@section('title', 'Order Details')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-header d-flex justify-content-between align-item-center">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
            </div>
            <div class="">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                <a href="{{ route('print-bill', $order->id) }}" class="btn btn-success">
                    <i class="bi bi-printer"></i>
                </a>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Order</h5>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Order Code</th>
                            <td>{{ $order->order_code ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{ $order->order_date ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>{{ $order->order_status ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Order Details</h5>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetails as $key => $details)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td><img src="{{ asset('storage/' . $details->kepemilikan_produk->product_photo) }}" alt="Image not available" width="100"></td>
                                <td>{{ $details->kepemilikan_produk->product_name }}</td>
                                <td>{{ $details->qty }}</td>
                                <td>{{ number_format($details->order_price) }}</td>
                                <td>{{ number_format($details->order_subtotal) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Grand Total</th>
                                <td colspan="3">
                                    <input type="hidden" class="form-control" name="grandtotal" readonly>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
