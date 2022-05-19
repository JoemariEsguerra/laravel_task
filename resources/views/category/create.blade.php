@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="pull-right">
                <a href="{{ url('/category') }}" class="btn btn-primary btn-sm my-3 pull-right" >Go Back</a>
             </div>
            <div class="card">

                <div class="card-header">{{ __('Create Category') }}</div>

                <div class="card-body">


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Warning!</strong> Please check your input code<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                  
                    <form method="POST" action="{{ route('category.store') }}">

                        @csrf
                        <div class="form-group ">
                          <label for="exampleFormControlInput1">Category Code</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="category_code" placeholder="Product Name">
                        </div>
                       
                        <div class="form-group ">
                          <label for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="category_description"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success btn-block mt-3" style="width: 100% !important; ">Submit</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
