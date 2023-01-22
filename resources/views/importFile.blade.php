@extends('homepage')
@include('sweetalert::alert')
@section('content')

    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-start">
        <h6 class="m-0 font-weight-bold text-primary">Import / Export</h6>
		<div class="btn-group justify-content-end" role="group" aria-label="Basic example">				
			<button type="button" class="btn "><a href="{{ route('exel_export') }}"
					class=" btn btn-sm btn-danger">Sample Dawnload</a></button>
		</div>
    </div>

    <div class="container ">
        <div class=" card row d-flex ">
			
            <div class="col-6 py-5">
				
                <form action="{{ url('') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  
                    <div class="form-group">
                        @error('advance_salary')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Import Exel File</label>
                        <input name="paid_salary" type="file" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" >
                    </div>
                   
                    <button type="submit" class="btn btn-warning">Upload</button>
                </form>
            </div>
        </div>


    </div>
@endsection