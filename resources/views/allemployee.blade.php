@extends('homepage')
@section('content')

<div class="container">
    <div class="col  mb-4">
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All Employee list</h6>
            
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Nid Number</th>
                  <th>Photo</th>
                  <th>Salary</th>
                  <th>vacation</th>
                  <th>Experience</th>
                  <th>Start</th>
                  <th>Actoin</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($employees as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->address }} , {{$data->city }}</td>
                    <td>{{ $data->nid_number }}</td>
                    <td><img class="img-responsive" height="50" width="50" src="/storage/{{$data->photo}}" alt="image"  />
                    </td>
                    <td>{{ $data->salary }}</td>                  
                    <td>{{ $data->vacation }}</td>                  
                    <td>{{ $data->experience }}</td>                  
                    <td>{{ $data->created_at }}</td>                  
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn "><a href="{{url('edit_employee/'.$data->id)}}" class="btn btn-sm btn-warning">Edit</a></button>
                        <button type="button" class="btn "> <a href="{{url('delete_employee/'.$data->id)}}" class="btn btn-sm btn-danger">Delete</a></button>
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



<div class="d-flex justify-content-center"  >
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {{ $employees->links()}}
        </ul>
      </nav>
   
</div>
    
@endsection
