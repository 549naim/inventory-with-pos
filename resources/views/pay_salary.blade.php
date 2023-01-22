@extends('homepage')
@section('content')
    @php
        $curr_month = date('F , Y');
    @endphp

    <div class="container">

        <div class="col  mb-4">
            <h4 class="badge bg-secondary text-light">{{ $curr_month }}</h4>
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"> pay sarary</h6>

                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Month</th>
                                <th>Salary</th>
                                <th>Advance sarary</th>
                                <th>Status</th>
                                <th>Paid salary</th>
                                <th>Actoin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $salary_month = date('F', strtotime('-1 month'));
                                $salary_year = date('Y', strtotime('-1 month'));
                            @endphp

                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td><img class="  img-responsive" height="50" width="50"
                                            src="/storage/{{ $data->photo }}" alt="image" />
                                    </td>
                                    <td class=" "><span class="badge rounded-pill bg-info text-dark">
                                            {{ $salary_month }}</span></td>

                                    <td>{{ $data->salary }}</td>

                                    @if ($data->advance && $data->advance->month == $salary_month && $data->advance->year == $salary_year)
                                        <td>{{ $data->advance->advance_salary }}</td>
                                    @else
                                        <td>0</td>
                                    @endif

                                    

                                        @if ($data->paid_all_salary && $data->paid_all_salary->month == $salary_month && $data->paid_all_salary->year == $salary_year)
                                            <td><span class="badge  bg-success text-light">
                                                    Paid</span></td>
                                        @else
                                            <td><span class="badge  bg-danger text-light">
                                                    Not Paid</span></td>
                                            </td>
                                        @endif

                                        @if ($data->paid_all_salary && $data->paid_all_salary->month == $salary_month && $data->paid_all_salary->year == $salary_year)
                                            <td><span>
                                                {{$data->paid_all_salary->salary}}  </span></td>
                                        @else
                                            <td><span >
                                                    0</span></td>
                                            </td>
                                        @endif

                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn "><a
                                                        href="{{ url('confirm_salary_payment/' . $data->id) }}"
                                                        class="btn btn-sm btn-warning">Pay Now</a></button>

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



    {{-- <div class="d-flex justify-content-center"  >
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {{ $data->links()}}
        </ul>
      </nav>
   
</div> --}}
@endsection
