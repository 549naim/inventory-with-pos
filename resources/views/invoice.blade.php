@extends('homepage')
@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="h3 mb-0 text-primary-8"><b>Invoice</b> </h1>
                <br>
                <br>
                <h6>Name : {{ $customer->name }}</h6>
                <h6>Shop Name : {{ $customer->shop_name }}</h6>
                <h6>Address : {{ $customer->address }}</h6>
                <h6>City : {{ $customer->city }}</h6>
                <h6>Phone : {{ $customer->phone }}</h6>
            </div>


            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> {{ date('Y/m/d') }} </li>

                </ol>
                <h6>Order date : {{ date('Y/m/d') }} </h6>
                <h6>Order Status :<span class="badge badge-danger">Pending</span> </h6>
                <h6>Order Id : {{ uniqid() }}</h6>

            </div>

        </div>




        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"> Products</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>

                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>

                                </tr>
                            </thead>
                            @foreach ($cart as $item)
                                <tbody>
                                    <tr>

                                        <td>{{ $item->prod_name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->qty * $item->price }}</td>

                                    </tr>

                                </tbody>
                            @endforeach

                        </table>
                    </div>


                </div>
            </div>
        </div>

        <div class=" py-5 d-sm-flex align-items-center justify-content-between mb-4">
            <div>
                <h6><b>Total Price : {{ $total }}</b></h6>
                <h6><b>vat : {{ $total * 0.11 }}</b>(11%) </h6>
                <br>
                <br>
                <b>Total to Pay : {{ $total + $total * 0.11 }}</b>

            </div>

            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    id="#myBtn">
                    modal
                </button>

            </div>

        </div>
       
       
        <!--Row-->
        <form action="{{url('/final_invoice')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Invoice of {{ $customer->name }}</h5>
                        </div>
                        <div class="form-group px-5">
                            @error('payment_status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="exampleInputEmail1">Payment Method</label>
                            <select name="payment_status" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                                <option value="" default></option>
                                <option value="Handcash">Handcash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Due">Due</option>
                            </select>
                        </div>
                        <div class="form-group px-5">
                            @error('pay')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="exampleInputEmail1">Paying Amount</label>
                            <input name="pay" type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group px-5">
                            @error('due')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="exampleInputEmail1">Due Amount</label>
                            <input name="due" type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                        <input type="hidden" name="order_date" value="{{ date('Y/m/d') }}">
                        <input type="hidden" name="order_status" value="Pending">
                        <input type="hidden" name="total_product" value="{{$cart->sum('qty')}}">
                        <input type="hidden" name="subtotal" value="{{$total}}">
                        <input type="hidden" name="vat" value="{{$total * 0.11}}">
                        <input type="hidden" name="total" value="{{$total + $total * 0.11}}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endsection
