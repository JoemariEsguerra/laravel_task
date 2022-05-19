@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="pull-right">
                <a href="/home" class="btn btn-primary btn-sm my-3 pull-right" >Go Back</a>
             </div>
            <div class="card">

                <div class="card-header">{{ __('Create Product') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('category.update',$data->CategoryId) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group ">
                          <label for="exampleFormControlInput1">Category Code</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="category_code" placeholder="Product Name" value="{{$data->CategoryCode}}">
                        </div>
                       
                        <div class="form-group ">
                          <label for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="category_description">{{$data->Description}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success btn-block mt-3" style="width: 100% !important; ">Update</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
