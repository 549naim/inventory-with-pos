@extends('homepage')
@section('content')

<div class="container">
    <div class="col  mb-4">
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All advance sarary</h6>
            
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Advance sarary</th>
                  <th>Month</th>
                  <th>Year</th>
                  <th>Date</th>
                  <th>Actoin</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($advance_sarary as $data)
                <tr>
                    <td>{{ $data->emp->name }}</td>
                    <td><img class="img-responsive" height="50" width="50" src="/storage/{{$data->emp->photo}}" alt="image"  />
                    </td>
                    <td>{{ $data->advance_salary }}</td>                  
                    <td>{{ $data->month }}</td>                  
                    <td>{{ $data->year}}</td>                  
                    <td>{{ $data->created_at }}</td>                  
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn "><a href="{{url('/'.$data->id)}}" class="btn btn-sm btn-warning">Edit</a></button>
                        <button type="button" class="btn "> <a href="{{url('/'.$data->id)}}" class="btn btn-sm btn-danger">Delete</a></button>
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
            {{ $advance_sarary->links()}}
        </ul>
      </nav>
   
</div>
    
@endsection