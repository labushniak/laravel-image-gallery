@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <form action="/store" method="post" enctype="multipart/form-data">
            @csrf
                <h1>Add Image</h1>
                <div class="form-control">
                    <input type="file" name="image">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection