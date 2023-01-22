@extends('homepage')
@include('sweetalert::alert')
@section('content')

    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
        <h6 class="m-0 font-weight-bold text-primary">Add Advance payment</h6>
    </div>

    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-6 ">
               
                <form action="{{ url('/insert_advance_salary') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        @error('emp_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Name of Employee</label>
                        @php
                            $data = DB::table('employees')->get();
                        @endphp
                        <select name="emp_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter Bank Branch Name">
                            @foreach ($data as $emp)
                                <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        @error('month')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Name Of Month</label>
                        <select name="month" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Name Of Month">
                            <option default>Select One</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>

                        </select>
                    </div>

                    <div class="form-group">
                        @error('advance_salary')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Advance Salary</label>
                        <input name="advance_salary" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Advance Salary">
                    </div>

                    <div class="form-group">
                        @error('year')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Year</label>
                        <input name="year" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Year">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>


    </div>
@endsection
