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
                <form action="{{ route('inser_attendense') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        @error('year')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Select date</label>
                        <input required type="date" name="att_date" id="">
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Details</th>
                                    <th>Date</th>
                                    <th>Status</th>



                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td><img class="img-responsive" height="50" width="50"
                                                src="/storage/{{ $data->photo }}" alt="image" />
                                        </td>
                                        <input type="hidden" name="user_id[]" value="{{ $data->id }}">
                                        <td>
                                            <input type="radio" value="Present"
                                                name="attendense[{{ $data->id }}]">Present
                                            <input type="radio" value="Absent"
                                                name="attendense[{{ $data->id }}]">Absent

                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div class="d-flex flex-row align-items-end justify-content-around " role="group"
                            aria-label="Basic example">

                            <button type="submit" class=" btn btn-sm btn-primary">Submit</button>
                        </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    </div>
@endsection
