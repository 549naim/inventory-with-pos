@extends('homepage')
@include('sweetalert::alert')
@section('content')
    <div class="container">
        <div class="btn-group" role="group" aria-label="Basic example">
            @foreach ($category as $category)
                <button type="button" class="btn "><a href="{{ url('') }}"
                        class=" btn btn-sm btn-info">{{ $category->cate_name }}</a></button>
            @endforeach

        </div>
        <hr>
        <div class="row ">
            <div class="col-5 justify-content-between">
                
                <table class="table align-items-center table-flush " id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>QTY</th>
                            <th>Price</th>
                            <th>Sub Total</th>
                            <th>Action</th>


                        </tr>
                    <tbody>

                        @foreach ($cart as $item)
                            <tr>
                                <td>{{ $item->prod_name }}</td>
                                <td>
                                    <form action="{{ url('/update_cart_qtty' . '/' . $item->id) }}" method="post"
                                        enctype="multipart/form-data">
                                     @csrf
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <input type="number" min="1" name="pro_qty" value="{{ $item->qty }}"
                                                style="width:50px;">
                                            <button type="submit" class=" btn-sm btn-info"><i class="fa fa-check-square"
                                                    aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->price * $item->qty }}</td>
                                <td><a href="{{ url('/delete_cart'.'/'.$item->id) }}" class=" btn-sm btn-danger"><i class="fa fa-trash-o"
                                            aria-hidden="true"></i>

                                    </a></td>

                            </tr>
                           

                        @endforeach

                        </thead>


                </table>
                <form action="{{ url('/invoice') }}" method="get"
                    enctype="multipart/form-data">
                    @csrf
                <div class="text-center">
                    <h4> <b>Total Price : {{$total}}</b> </h4>
                    <h4> <b>vat : {{$total * .11}}</b>(11%) </h4>
                    <hr>
                    <h2><b>Total to Pay : {{$total + ($total * .11)}}</b> </h2>
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <label for="exampleInputEmail1">select Customer</label>
                        
                        <select required name="cus_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Name Of Month">
                            @error('cus_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                            <option default></option>
                            @foreach ($customer as $customer)
                                <option value="{{$customer->id}}">{{ $customer->name }}</option>
                            @endforeach
    
                        </select>
    
                    </div>
                </form>
                    <button type="submit"   class="btn btn-danger ">Create Invoice</button>
                </div>

            </div>
            <div class="col-7 justify-content-between">
                <!-- DataTable with Hover -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                        </div>
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush " id="dataTableHover">
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Product Code</th>
                                        <th>Image</th>

                                    </tr>
                                </thead>
                                @foreach ($data as $data)
                                    <tbody>
                                        <form action="{{ route('add_cart') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="prod_id" value="{{ $data->id }}" />
                                            <input type="hidden" name="prod_name" value="{{ $data->product_name }}" />
                                            <input type="hidden" name="qty" value='1' />
                                            <input type="hidden" name="price" value="{{ $data->selling_price }}" />

                                            <tr>
                                                <td><button type="submit" class="btn btn-primary size"><i
                                                            class="fa fa-plus" aria-hidden="true"></i></button>
                                                  </td>
                                                  <td> {{ $data->product_name }}</td>
                                                <td>{{ $data->cate->cate_name }}</td>
                                                <td>{{ $data->selling_price }}</td>
                                                <td>{{ $data->product_code }}</td>
                                                <td><img class="img-responsive" height="40" width="40"
                                                        src="/storage/{{ $data->product_image }}" alt="image" />
                                                </td>
                                            </tr>
                                        </form>
                                    </tbody>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
