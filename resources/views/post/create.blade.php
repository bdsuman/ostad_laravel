@extends('app')
@section('title','Post Add')
@push('style')
<style>
   
</style>
@endpush
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            Post Create
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
                    <form action="{{ route('post.store') }}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Write title here.">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="description" name="description" placeholder="Write description here.">{{ old('description') }}</textarea>
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