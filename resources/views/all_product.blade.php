@extends('homepage')
@section('content')

<div class="container">
    <div class="col  mb-4">
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
            
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th> Product Name</th>
                  <th>Product Photo</th>
                  <th>Selling Price</th>
                  <th>product Code</th>
                  <th>Warehouse</th>
                  <th> Warehouse Rute</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $data)
                <tr>
                    <td>{{ $data->product_name }}</td>
                    <td><img class="img-responsive" height="50" width="50" src="/storage/{{$data->product_image}}" alt="image"  />
                    </td>
                    <td>{{ $data->selling_price }}</td>                  
                    <td>{{ $data->product_code }}</td>                  
                    <td>{{ $data->product_warehouse}}</td>                  
                    <td>{{ $data->product_route }}</td>                  
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn "><a href="{{url('/'.$data->id)}}" class="btn btn-sm btn-info">Details</a></button>
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




    
@endsection