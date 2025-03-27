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
                        <form action="{{ route('categories.update', $edit->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="" class="col-form-label">Category Name: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category Name" required value="{{ $edit->category_name }}">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                                <a href="{{ url()->previous() }}" class="text-primary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
