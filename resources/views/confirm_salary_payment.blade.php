@extends('homepage')
@include('sweetalert::alert')
@section('content')

    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
        <h6 class="m-0 font-weight-bold text-primary">Add payment</h6>
    </div>

    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-6 ">
               
                <form action="{{ url('insert_salary/' . $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        
                        <h4>Employee Name : {{$data->name}}</h4>
                        <h4>Salary : {{$data->salary}}</h4>
                        
                       
                    </div>

                    

                    <div class="form-group">
                        @error('advance_salary')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Salary</label>
                        <input name="paid_salary" type="number" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Salary">
                    </div>
                   
                    <button type="submit" class="btn btn-warning">Pay Salary</button>
                </form>
            </div>
        </div>


    </div>
@endsection