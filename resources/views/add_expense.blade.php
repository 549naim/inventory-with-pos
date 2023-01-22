@extends('homepage')
@include('sweetalert::alert')
@section('content')

    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
        <h6 class="m-0 font-weight-bold text-primary">Add new Expense</h6>
    </div>

    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-6 ">
               
                <form action="{{ url('/insert_expense') }}" method="post" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="form-group">
                        
                        <label for="exampleInputEmail1">Expense Details</label>
                        <textarea name="details" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Expense Details"></textarea>
                    </div>

                    <div class="form-group">
                        @error('amount')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Amount</label>
                        <input name="amount" type="number" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Amount">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>


    </div>
@endsection
