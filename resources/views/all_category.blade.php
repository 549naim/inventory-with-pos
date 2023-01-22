@extends('homepage')
@section('content')
    
    <div class="container">
        <div class="col  mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Employee list</h6>
                  
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-primary collapse-item" href="{{route('add_category')}}">Add category</a>                        
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>S I </th>
                                <th>Category Name</th>
                                <th>Action</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->cate_name }}</td>
                                    
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                           
                                            <button type="button" class="btn "><a
                                                    href="{{url('/'.$data->id)}}"
                                                    class=" btn btn-sm btn-warning">Edit</a></button>
                                            <button type="button" class="btn "><a
                                                    href="{{url('delete_category/'.$data->id)}}"
                                                    class=" btn btn-sm btn-danger">Delete</a></button>
                                        </div>
                                    </td>


                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>



   
@endsection
