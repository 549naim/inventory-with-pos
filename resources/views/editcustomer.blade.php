@extends('homepage')
@section('content')
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
        <h6 class="m-0 font-weight-bold text-primary">Add Customer</h6>
    </div>

    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-6 ">
                <form action="{{url('/update_customer',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Name</label>
                        <input value="{{$data->name}}" name="name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Email</label>
                        <input value="{{$data->email}}" name="email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">phone</label>
                        <input value="{{$data->phone}}" name="phone" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter phone">
                    </div>

                    <div class="form-group">
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Address</label>
                        <input value="{{$data->address}}" name="address" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Address">
                    </div>

                    <div class="form-group">
                        @error('shop_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Shop Name</label>
                        <input value="{{$data->shop_name}}" name="shop_name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Shop Name">
                    </div>

                    <div class="form-group">
                        @error('nid_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Nid Number</label>
                        <input value="{{$data->nid_number}}" name="nid_number" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Nid Number">
                    </div>



                    <div class="form-group">
                        @error('bank_holder_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1"> Bank Holder Name</label>
                        <input value="{{$data->bank_holder_name}}" name="bank_holder_name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Bank Holder Name">
                    </div>

                    <div class="form-group">
                        @error('bank_account_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1"> Bank Account Number</label>
                        <input value="{{$data->bank_account_number}}" name="bank_account_number" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Bank Account Number">
                    </div>

                    <div class="form-group">
                        @error('bank_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1"> Bank Name</label>
                        <input value="{{$data->bank_name}}" name="bank_name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Bank Name">
                    </div>

                    <div class="form-group">
                        @error('bank_branch_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1"> Bank Branch Name</label>
                        <input value="{{$data->bank_branch_name}}" name="bank_branch_name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Bank Branch Name">
                    </div>

                    <div class="form-group">
                        @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">City</label>
                        <input value="{{$data->city}}"  name="city" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter City">
                    </div>
                    <div class="form-group">
                        @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <img class="img-responsive" height="50" width="50" src="/storage/{{$data->photo}}" alt="image"  />
                        <label for="exampleInputEmail1">Add Photo</label>
                        <input value="{{$data->photo}}"  name="photo" type="file" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Choose photo">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>


    </div>
@endsection
