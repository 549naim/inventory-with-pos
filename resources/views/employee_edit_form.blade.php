@extends('homepage')
@section('content')
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
        <h6 class="m-0 font-weight-bold text-primary">Add Employee</h6>
    </div>

    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-6 ">
                <form action="{{url('/update_employee',$employee->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Name</label>
                        <input value="{{$employee->name}}" name="name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Email</label>
                        <input value="{{$employee->email}}" name="email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label  for="exampleInputEmail1">phone</label>
                        <input value="{{$employee->phone}}" name="phone" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter phone">
                    </div>

                    <div class="form-group">
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Address</label>
                        <input value="{{$employee->address}}" name="address" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Address">
                    </div>

                    <div class="form-group">
                        @error('experience')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Experience</label>
                        <input value="{{$employee->experience}}" name="experience" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Type Yes / No">
                    </div>

                    <div class="form-group">
                        @error('nid_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Nid Number</label>
                        <input value="{{$employee->nid_number}}" name="nid_number" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Nid Number">
                    </div>



                    <div class="form-group">
                        @error('salary')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Salary</label>
                        <input value="{{$employee->salary}}" name="salary" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Salary">
                    </div>

                    <div class="form-group">
                        @error('vacation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Vacation</label>
                        <input value="{{$employee->vacation}}" name="vacation" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Vacation">
                    </div>

                    <div class="form-group">
                        @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">City</label>
                        <input value="{{$employee->city}}" name="city" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter City">
                    </div>
                    <div class="form-group">
                        <img class="img-responsive" height="50" width="50" src="/storage/{{$employee->photo}}" alt="image"  />
                        @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Add Photo</label>
                        <input value="{{$employee->photo}}"  name="photo" type="file" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Choose photo">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>


    </div>
@endsection