@extends('app')
@section('title','Product Add')
@push('style')
@endpush
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            Product Create
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <ul>
                                <li>{{ $message }}</li>
                        </ul>
                    </div>
                        
                    @endif
                    <form action="{{ route('product.store') }}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Write name here.">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Write price here.">
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
@endsection

@push('script')
    <script type="text/javascript">
        // window.addEventListener("load", (event) => {
        //     alert("page is fully loaded");
        // });
    </script>
@endpush