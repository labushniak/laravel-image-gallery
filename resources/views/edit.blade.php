@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <form action="/update/{{$imageInView->id}}" method="post" enctype="multipart/form-data">
                <h1>Edit Image</h1>
                @csrf
                <img src="/{{$imageInView->image}}" alt="" class="img-thumbnail">
                <div class="form-control">
                    <input type="file" name="image">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection