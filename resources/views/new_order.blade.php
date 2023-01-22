@extends('homepage')
@section('content')
    <!-- Container Fluid-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">New Pending Orders </h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>

                                    <th>Name</th>
                                    <th>Payment Method</th>
                                    <th>Order Status</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            @foreach ($data as $item)
                                <tbody>
                                    <tr>

                                        <td>{{ $item->cus->name }}</td>
                                        <td>{{ $item->payment_status }}</td>
                                        <td><span class="badge badge-danger">{{ $item->order_status }}</span></td>
                                        <td>{{ $item->pay }}</td>
                                        <td>{{ $item->due }}</td>
                                        <td>
                                            <a href="{{ url('/complete_order'.'/'.$item->id) }}"
                                            class=" btn btn-sm btn-info">Complete Order</a>
                                            <a href="{{ url('/delete_order'.'/'.$item->id) }}"
                                                class=" btn btn-sm btn-danger"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i></a>
                                        </td>


                                    </tr>

                                </tbody>
                            @endforeach

                        </table>
                    </div>


                </div>
            </div>
        </div>


    </div>
@endsection
