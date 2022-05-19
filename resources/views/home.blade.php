@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="pull-right">
                <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm my-3 pull-right" >Create Product</a>
             </div>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">

                <div class="card-header">{{ __('Product') }}</div>

                {{-- @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif --}}

           
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <meta name="csrf-token" content="{{ csrf_token() }}" />

                    <form method="POST" action="{{ route('product.search')}}">
                        @csrf
                        <div class="form-row my-2">
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Search Product..." name="search">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-secondary btn-block">Search</button>
                            </div>
                        </div>
                    </form>


                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Product Code</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category Code</th>
                            <th scope="col">Category Description</th>
                            <th scope="col">Product Color</th>
                            <th scope="col">Status </th>
                            <th scope="col" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (isset($data))

                                @if (count($data) > 0)
                                    @foreach ($data as $p)
                                    <tr>
                                        <td>{{ $p->ProductCode}}</td>
                                        <td>{{ $p->ProductName }}</td>
                                        <td>{{ $p->Description }}</td>
                                        <td>{{ $p->CategoryCode }}</td>
                                        <td>{{ $p->cat_desc }}</td>
                                        <td> <input type="color" value="{{ $p->color }}"></td>
                                            
                                        
                                        <td>
                                            @if ( $p->IsActive)
                                            <span class="badge badge-pill badge-success"> Active </span>
                                            @else
                                            <span class="badge badge-pill badge-danger"> Not Active </span>
                                            @endif
                                        </td>
                                    
                                        <td class="text-center">
                                            <a href="{{ route('product.edit',$p->Productid)}}" class="btn btn-sm btn-success">View</a>
                                            <button type="button" class="btn btn-sm btn-danger deleteModal" alt="{{$p->Productid}}">
                                                Remove
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="100" class="text-center">
                                        <p>NO DATA FOUND..</p>
                                    </td>
                                </tr>

                                @endif
                         
                             
                            @else
                                @foreach ($products as $p)
                                <tr>
                                    <td>{{ $p->ProductCode}}</td>
                                    <td>{{ $p->ProductName }}</td>
                                    <td>{{ $p->Description }}</td>
                                    <td>{{ $p->CategoryCode }}</td>
                                    <td>{{ $p->cat_desc }}</td>
                                    <td> <input type="color" value="{{ $p->color }}" disabled></td>
                                        
                                    
                                    <td>
                                        @if ( $p->IsActive)
                                        <span class="badge badge-pill badge-success"> Active </span>
                                        @else
                                        <span class="badge badge-pill badge-danger"> Not Active </span>
                                        @endif
                                    </td>
                                
                                    <td class="text-center">
                                        <a href="{{ route('product.edit',$p->Productid)}}" class="btn btn-sm btn-success">View</a>
                                        <button type="button" class="btn btn-sm btn-danger deleteModal" alt="{{$p->Productid}}">
                                            Remove
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            @endif

                   
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('page_script')
<script src="https://rawgit.com/makeusabrew/bootbox/f3a04a57877cab071738de558581fbc91812dce9/bootbox.js"></script>
<script>
        $(document).on('click','.deleteModal',function(){
            bootbox.confirm('are you sure you want to delete ? ', (res) => {
            let id =  $(this).attr("alt")
            let token = $('meta[name="csrf-token"]').attr('content')
                $.ajax({
                    url: '/product/' + id,
                    type: 'DELETE',
                    data: {
                        _token : token, 
                    },
                    success: function(result) {
                        location.reload()
                        // Do something with the result
                    }
                });
        })
        
        })
</script>
@endpush
