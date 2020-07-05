@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}
            </div>
            @endif
            <form action="{{route('food.update',[$food->id])}}" method="POST" enctype="multipart/form-data">@csrf
                {{ method_field('PUT')}}
                <div class="card">
                    <div class="card-header">update food</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name='name' class="form-control @error('name') is-invalid  @enderror"
                                value="{{$food->name}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>

                            <textarea class="form-control  @error('description') is-invalid @enderror"
                                name="description">
                                {{$food->description}}
                            </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Price</label>
                            <input type="text" name='price' class="form-control  @error('price') is-invalid @enderror"
                                value="{{$food->price}}">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Category</label>
                            <select name="category" class="form-control @error('category') is-invalid @enderror">
                                <option value="">Select Category</option>
                                @foreach (App\Category::all() as $category)
                                <option value="{{$category->id}}" @if($category->id==$food->category_id)selected @endif
                                    >{{$category->name}}</option>
                                @endforeach
                                {{-- <input type="text" name='name'
                                    class="form-control  @error('category') is-invalid @enderror"> --}}
                                @error('cetegory')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </select>


                        </div>
                        <div class="form-group">
                            <label for="name">Image</label>
                            <input type="file" name='image' class="form-control  @error('image') is-invalid @enderror">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection