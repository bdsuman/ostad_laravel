@extends('app')
@section('title','Product Table')
@push('style')
@endpush
@section('content')
<div class="container mt-5">
    <div style="text-align: left;">
        <h1>All Product Table</h1>
    </div>

    <div style="text-align: right;">
        <a href="{{ route('product.create') }}" class="btn btn-success">Add Product</a>
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
            <th>Name</th>
            <th>Price</th>
            <th>Option</th>
        </thead>
        <tbody>
            @forelse ($products as $key=>$value)
                
           
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ number_format($value->price,2)}}</td>
                <td style="display: flex;">
                    <a href="{{ route('product.edit',$value->id) }}" class="btn btn-warning">Edit</a>
                    &nbsp; &nbsp;
                    <form action="{{  route('product.destroy',$value->id) }}" method="POST" >
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
    {{ $products->links() }}
</div>
@endsection

@push('script')
<script type="text/javascript">
    // window.addEventListener("load", (event) => {
    //     alert("page is fully loaded");
    // });
</script>
@endpush