@extends('layouts.inc.main')
@section('title', $title)
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <div class="mt-4 mb-3">
                        <div align="right" class="mb-3">
                            <a href="{{ route('pos.create') }}">Add Order (POS)</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Order Code</th>
                                    <th>Order Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach ($orders as $index => $ord)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $ord->order_code }}</td>
                                    <td>{{ $ord->order_date }}</td>
                                    <td>{{ $ord->order_amount }}</td>
                                    <td>{{ $ord->order_status ? 'Paid' : 'Unpaid'}}</td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm" href="{{ route('pos.show', $ord->id) }}">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a class="btn btn-success btn-sm" href="{{ route('print-bill', $ord->id) }}">
                                            <i class="bi bi-printer"></i>
                                        </a>
                                        <form class="d-inline" action="{{ route('pos.destroy', $ord->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this data?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
