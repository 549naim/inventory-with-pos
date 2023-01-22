@extends('homepage')
@section('content')
    
    <div class="container">
        <div class="col  mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Suppliers list</h6>

                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Photo</th>
                                <th>Shop Name</th>
                                <th>Supplier Type</th>
                                <th>Actoin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->address }} , {{ $data->city }}</td>
                                    <td><img class="img-responsive" height="50" width="50"
                                            src="/storage/{{ $data->photo }}" alt="image" />
                                    </td>
                                    <td>{{ $data->shop_name }}</td>
                                    @if ($data->type == 1)
                                    <td>Distributor</td>                                   
                                    @elseif ($data->type == 2)
                                    <td>Whole seller</td> 
                                    @else
                                    <td>Brochure</td> 
                                    @endif
                                    
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn "><a
                                                    href="{{ url('supplierdetails/' . $data->id) }}"
                                                    class=" btn btn-sm btn-primary">Details</a></button>
                                            <button type="button" class="btn "><a
                                                    href="{{ url('edit_supplier/' . $data->id) }}"
                                                    class=" btn btn-sm btn-warning">Edit</a></button>
                                            <button type="button" class="btn "><a
                                                    href="{{ url('delete_supplier/' . $data->id) }}"
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



    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{ $suppliers->links() }}
            </ul>
        </nav>

    </div>
@endsection
