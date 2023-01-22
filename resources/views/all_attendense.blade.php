@extends('homepage')
@include('sweetalert::alert')

@section('content')
    
    <div class="container">
        <div class="col  mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All attendense</h6>
                    <h4 class="m-0 font-weight-bold text-danger">  </h4>
                    <div class="btn-group" role="group" aria-label="Basic example">
                                           
                        <form action="{{ url('/find_attendense') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                @error('year')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
        
                                
                                <input required type="date" name="att_date">
                                
                                <div class="btn" role="group" aria-label="Basic example">       
                                    <button type="submit" class="btn btn-sm btn-info ">search</button>
                                </div>
        
                            </div>
                        </form>
                    </div>
                </div>
                
                
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Attendense</th>
                                <th>Date</th>
                                <th>Action</th>
                                
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ $data->emp->name }}</td>
                                    <td><img class="img-responsive" height="50" width="50" src="/storage/{{$data->emp->photo}}" alt="image"  />
                                    </td>
                                    <td>{{ $data->attendense }}</td>
                                    <td>{{ $data->att_date }}</td>
                                   
                                    
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                           
                                            <button type="button" class="btn "><a
                                                href="{{url('edit_attendense/'.$data->id)}}"
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


