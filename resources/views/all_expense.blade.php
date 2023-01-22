@extends('homepage')
@section('content')
    
    <div class="container">
        <div class="col  mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Expense list</h6>
                    <h4 class="m-0 font-weight-bold text-danger"> Total Expense : {{$amount}}</h4>
                    <div class="btn-group" role="group" aria-label="Basic example">
                                           
                        <button type="button" class="btn "><a
                                href="{{url('/this_month_expense')}}"
                                class=" btn btn-sm btn-info">This Month </a></button>
                        <button type="button" class="btn "><a
                                href="{{url('today_expense/')}}"
                                class=" btn btn-sm btn-danger">Today</a></button>
                    </div>
                </div>
                
                
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
                                                    href="{{url('/this_month_expense')}}"
                                                    class=" btn btn-sm btn-info">Details </a></button>
                                            <button type="button" class="btn "><a
                                                    href="{{url('/this_month_expense')}}"
                                                    class=" btn btn-sm btn-warning">Edit </a></button>
                                            <button type="button" class="btn "><a
                                                    href="{{url('today_expense/')}}"
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
