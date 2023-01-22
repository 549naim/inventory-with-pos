@extends('homepage')
@section('content')
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
        <h6 class="m-0 font-weight-bold text-primary">Add Customer</h6>
    </div>

    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-6 ">
                <form action="{{ route('supplier_form') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Name</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">phone</label>
                        <input name="phone" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter phone">
                    </div>

                    <div class="form-group">
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Address</label>
                        <input name="address" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Address">
                    </div>

                    <div class="form-group">
                        @error('shop_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Shop Name</label>
                        <input name="shop_name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Shop Name">
                    </div>

                    <div class="form-group">
                        @error('nid_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Nid Number</label>
                        <input name="nid_number" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Nid Number">
                    </div>

                    <div class="form-group">
                        @error('typle')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1"> Supplier Type</label>
                        <select name="type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter Bank Branch Name">
                            <option default >Select One</option>
                            <option value="1">Distributor</option>
                            <option value="2">Whole seller</option>
                            <option value="3">Brochure</option>
                        </select>
                    </div>


                    <div class="form-group">
                        @error('bank_holder_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1"> Bank Holder Name</label>
                        <input name="bank_holder_name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Bank Holder Name">
                    </div>

                    <div class="form-group">
                        @error('bank_account_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1"> Bank Account Number</label>
                        <input name="bank_account_number" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Bank Account Number">
                    </div>

                    <div class="form-group">
                        @error('bank_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1"> Bank Name</label>
                        <input name="bank_name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Bank Name">
                    </div>

                    <div class="form-group">
                        @error('bank_branch_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1"> Bank Branch Name</label>
                        <input name="bank_branch_name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Bank Branch Name">
                    </div>


                    <div class="form-group">
                        @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">City</label>
                        <input name="city" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter City">
                    </div>
                    <div class="form-group">
                        @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Add Photo</label>
                        <input name="photo" type="file" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Choose photo">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>


    </div>
@endsection
