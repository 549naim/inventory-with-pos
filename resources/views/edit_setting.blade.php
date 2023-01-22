@extends('homepage')
@section('content')
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
        <h6 class="m-0 font-weight-bold text-primary">Update Customer</h6>
    </div>

    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-6 ">
                <form action="{{url('/update_setting')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        @error('company_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Company Name</label>
                        <input value="{{$data->company_name}}" name="company_name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter company_name">
                    </div>

                    <div class="form-group">
                        @error('company_address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputcompany_address1">company_address</label>
                        <input value="{{$data->company_address}}" name="company_address" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        @error('company_email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">company_email</label>
                        <input value="{{$data->company_email}}" name="company_email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter phone">
                    </div>

                    <div class="form-group">
                        @error('company_phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">company_phone</label>
                        <input value="{{$data->company_phone}}" name="company_phone" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Address">
                    </div>

                    <div class="form-group">
                        @error('company_city')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">City</label>
                        <input value="{{$data->company_city}}" name="company_city" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="City">
                    </div>

                    <div class="form-group">
                        @error('company_country')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Country</label>
                        <input value="{{$data->company_country}}" name="company_country" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter  Country">
                    </div>



                    <div class="form-group">
                        @error('company_zipcode')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1"> Zipcode</label>
                        <input value="{{$data->company_zipcode}}" name="company_zipcode" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Zipcode">
                    </div>

                
                    <div class="form-group">
                        @error('company_logo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <img class="img-responsive" height="50" width="50" src="/storage/{{$data->company_logo}}" alt="image"  />
                       
                        <input value="{{$data->company_logo}}"  name="company_logo" type="file" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Choose photo">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>


    </div>
@endsection
