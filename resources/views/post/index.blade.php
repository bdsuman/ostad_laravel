@extends('app')
@section('title','Post Table')
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
<div class="container mt-5">
    <div style="text-align: left;">
        <h1>All Post Table</h1>
    </div>

    <div style="text-align: right;">
        <a href="{{ route('post.create') }}" class="btn btn-success">Add Post</a>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <ul>
                <li>{{ $message }}</li>
        </ul>
    </div>
    @endif
    <br>
    <table class="table table-bordered table-striped">
        <thead>
            <th>Serial</th>
            <th>Title</th>
            <th>Description</th>
            <th>Option</th>
        </thead>
        <tbody>
            @forelse ($posts as $key=>$post)
                
           
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td style="display: flex;">
                    <a href="{{ route('post.edit',$post->id) }}" class="btn btn-warning">Edit</a>
                    &nbsp; &nbsp;
                    <form action="{{  route('post.destroy',$post->id) }}" method="POST" >
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this');">Delete</button>
                    </form>
                   
                </td>
                
            </tr>
            @empty
                <tr>
                    <td colspan="4">No Data Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('script')
<script type="text/javascript">
    // window.addEventListener("load", (event) => {
    //     alert("page is fully loaded");
    // });
</script>
@endpush