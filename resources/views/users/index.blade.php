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
                            <a href="{{ route('users.create') }}">Add User</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>User Name </th>
                                    <th>User Email </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}"><i class="bi bi-pencil"></i></a>
                                        <form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="post">
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
