@extends('app')
@section('title','Welcome to Ostad')
@push('style')
<style>
    .hero {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8fafc;
        color: #636b6f;
        font-size: 2em;
        text-align: center;
    }
</style>
@endpush
@section('content')
<div class="hero">
    <h1>Welcome to Laravel!</h1>
</div>
@endsection

@push('script')
<script type="text/javascript">
    // window.addEventListener("load", (event) => {
    //     alert("page is fully loaded");
    // });
</script>
@endpush