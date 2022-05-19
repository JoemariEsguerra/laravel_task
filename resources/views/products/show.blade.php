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

                    <form method="POST" action="{{ route('product.update',$id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group ">
                          <label for="exampleFormControlInput1">Product Name</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="product_name" value="{{ $data->ProductName }}">
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlInput1">Product Code</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="product_code" value="{{ $data->ProductCode }}">
                          </div>

                             {{-- category code --}}

                             <div class="form-group">
                              <label for="exampleFormControlSelect1">Category Code</label>
                              <select class="form-control" id="exampleFormControlSelect1" name="product_category_code">
                                    @foreach ($category as $cat)
                                    <option value="{{$cat->CategoryId}}" {{ $cat->CategoryId == $data->CategoryId ? 'selected' : '' }}>{{ $cat->CategoryCode }}</option>
                                    @endforeach
                              </select>
                            </div>
    
                            {{-- category code --}}
                            
                          <div class="form-group ">
                            <label for="exampleFormControlInput1">Product Price</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="product_price" value="{{ $data->Price }}">
                          </div>
                       
                        <div class="form-group ">
                          <label for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="product_description">{{ isset($data->Description) ? $data->Description : '' }}</textarea>
                        </div>

                        <div class="form-group">
                          <label>Status</label>
                            <select class="form-control" name="product_status">
                              <option value="1" {{ $data->IsActive ? 'selected' : '' }}>Enabled</option>
                              <option value="0">Disabled</option>
                            </select>
                        </div>

                        <div class="form-group ">
                          <label for="exampleFormControlInput1">Size</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="product_size" placeholder="Product Size" value="{{ $data->size }}">
                      </div>

                      <div class="form-row">
                          <div class="form-group col-md-2">
                          <label for="exampleFormControlTextarea1">Product Color</label>
                          <input type="color" class="form-control" rows="1" name="product_color"  value="{{ $data->color }}">
                          </div>
                      </div>


                        <button type="submit" class="btn btn-success btn-block mt-3" style="width: 100% !important; ">Update</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
