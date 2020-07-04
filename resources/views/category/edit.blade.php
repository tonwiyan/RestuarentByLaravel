@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}
            </div>
            @endif
            <form action="{{route('category.update',[$catagory->id])}}" method="POST">@csrf
                {{ method_field('PUT')}}
                <div class="card">
                    <div class="card-header">Update food categorys</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{$catagory->name}}  @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection