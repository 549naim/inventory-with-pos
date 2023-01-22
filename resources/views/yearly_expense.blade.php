@extends('homepage')
@section('content')
    <div class="container">
        <div class="col  mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $year_e }} Expense list</h6>
                    <h4 class="m-0 font-weight-bold text-danger">This Year Total Expense : {{ $amount }}</h4>

                    <div class="btn-group" role="group" aria-label="Basic example">

                        <button type="button" class="btn "><a href="{{ url('/this_month_expense') }}"
                                class=" btn btn-sm btn-info">This Month </a></button>
                        <button type="button" class="btn "><a href="{{ url('today_expense/') }}"
                                class=" btn btn-sm btn-danger">Today</a></button>
                    </div>
                </div>
                <form action="{{ url('/find_yearly_expense') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        @error('year')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputEmail1">Select Year</label>
                        <select name="year" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <option default>select year</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                        
                        <div class="btn-group" role="group" aria-label="Basic example">

                            <button type="submit" class="btn btn-sm btn-info ">search</button>
                        </div>

                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Details</th>
                                <th>Date</th>
                                <th>Month</th>
                                <th>Amount</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ $data->details }}</td>
                                    <td>{{ $data->date }}</td>
                                    <td>{{ $data->month }}</td>
                                    <td>{{ $data->amount }}</td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            <button type="button" class="btn "><a
                                                    href="{{ url('/this_month_expense') }}"
                                                    class=" btn btn-sm btn-info">Details </a></button>
                                            <button type="button" class="btn "><a
                                                    href="{{ url('/this_month_expense') }}"
                                                    class=" btn btn-sm btn-warning">Edit </a></button>
                                            <button type="button" class="btn "><a href="{{ url('today_expense/') }}"
                                                    class=" btn btn-sm btn-danger">Delete</a></button>
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
