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

                  
                    <form method="POST" action="{{ route('product.store') }}">

                        @csrf
                        <div class="form-group ">
                          <label for="exampleFormControlInput1">Product Name</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="product_name" placeholder="Product Name">
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlInput1">Product Code</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="product_code" placeholder="Product Name">
                          </div>

                          {{-- category code --}}
                          @if (count($category) > 0 )
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Category Code</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="product_category_code">
                                    @foreach ($category as $cat)
                                    <option value="{{$cat->CategoryId}}">{{ $cat->CategoryCode }}</option>
                                    @endforeach
                                </select>
                            </div>
                          @endif
                         
  
                          {{-- category code --}}


                          <div class="form-group ">
                            <label for="exampleFormControlInput1">Product Price</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="product_price" placeholder="Product Price">
                          </div>
                       
                        <div class="form-group ">
                          <label for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="product_description"></textarea>
                        </div>

    
                        <div class="form-group ">
                            <label for="exampleFormControlInput1">Size</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="product_size" placeholder="Product Size">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-2">
                            <label for="exampleFormControlTextarea1">Product Color</label>
                            <input type="color" class="form-control" rows="1" name="product_color">
                            </div>
                        </div>

                       
                        <button type="submit" class="btn btn-success btn-block mt-3" style="width: 100% !important; ">Submit</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
