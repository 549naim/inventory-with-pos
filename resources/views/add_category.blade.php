@extends('homepage')
@include('sweetalert::alert')
@section('content')

    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
        <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>       
    </div>
    <div class="card-header py-3 d-flex flex-row align-items-end justify-content-end">
        <a class="btn btn-primary collapse-item" href="{{route('all_category')}}">All category </a>       
    </div>
    
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-6 ">
               
                <form action="{{ url('/insert_category') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        
                      
                        
                       
                    </div>

                    

                    <div class="form-group">
                        @error('advance_salary')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Category Name</label>
                        <input name="cate_name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Category Name">
                    </div>
                   
                    <button type="submit" class="btn btn-info">Add Category</button>
                </form>
            </div>
        </div>


    </div>
@endsection