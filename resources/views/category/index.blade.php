@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="pull-right">
                <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm my-3 pull-right" >Create Category</a>
             </div>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">

                <div class="card-header">{{ __('Category') }}</div>

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
                 


                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Category Id</th>
                            <th scope="col">Category Code</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                           
                                @foreach ($category as $p)
                                <tr>
                                    <td>{{ $p->CategoryId}}</td>
                                    <td>{{ $p->CategoryCode }}</td>
                                    <td>{{ $p->Description }}</td>
                                
                                    <td class="text-center">
                                        <a href="{{ route('category.edit',$p->CategoryId)}}" class="btn btn-sm btn-success">View</a>
                                        {{-- <form action="{{ route('category.show',$p->CategoryId) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                        </form> --}}

                                        <button type="button" class="btn btn-sm btn-danger deleteModal" alt="{{$p->CategoryId}}">
                                            Remove
                                        </button>
                                    </td>
                                </tr>
                                @endforeach

                         
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
                    url: '/category/' + id,
                    type: 'DELETE',
                    data: {
                        _token : token, 
                        id
                    },
                    success: function(result) {
                        console.log(result)
                        location.reload()
                        // Do something with the result
                    }
                });
        })
        
        })
</script>
@endpush
