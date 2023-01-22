@extends('homepage')
@include('sweetalert::alert')
@section('content')
    <div class="container">
        <div class="col  mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"> Take Attendese</h6>


                    <div class="btn-group" role="group" aria-label="Basic example">

                        <button type="button" class="btn "><a href="{{ url('/all_attendense') }}"
                                class=" btn btn-sm btn-info">All Attendense</a></button> </a></button>
                       
                    </div>
                </div>
                <form action="{{url('/update_attendense',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Current Attendense</th>
                                    <th>Change Attendense</th>
                                </tr>
                            </thead>
                            <tbody>

                              
                                    <tr>
                                        <td>{{ $data->emp->name }}</td>
                                        <td><img class="img-responsive" height="50" width="50"
                                                src="/storage/{{ $data->emp->photo }}" alt="image" />
                                        </td>
                                        <td>{{ $data->att_date }}</td>
                                        <td>{{ $data->attendense }}</td>
                                        
                                        <td>
                                            <input type="radio" value="Present"
                                                name="attendense">Present
                                            <input type="radio" value="Absent"
                                                name="attendense">Absent

                                        </td>

                                    </tr>
                                


                            </tbody>
                        </table>
                        <div class="d-flex flex-row align-items-end justify-content-around " role="group"
                            aria-label="Basic example">

                            <button type="submit" class=" btn btn-sm btn-primary">Update</button>
                        </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    </div>
@endsection

