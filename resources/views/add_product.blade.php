@extends('homepage')
@section('content')
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
        <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
        <div class="btn-group d-flex flex-row align-items-center justify-content-end" role="group" aria-label="Basic example">

            <button type="button" class="btn "><a href="{{ url('/import_export') }}"
                    class=" btn btn-sm btn-info">Import</a></button> </a></button>
           
        </div>
    </div>
    
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-6 ">
                <form action="{{ route('insert_product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        @error('product_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Product Name</label>
                        <input name="product_name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Product Name">
                    </div>


                    <div class="form-group">
                        @error('cate_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Select category</label>
                        @php
                            $data = DB::table('categories')->get();
                        @endphp
                        <select name="cate_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter categories">
                            <option value="default">Select One</option>
                            @foreach ($data as $category)
                                <option value="{{ $category->id }}">{{ $category->cate_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        @error('supplier_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Select Product Supplier</label>
                        @php
                            $data = DB::table('suppliers')->get();
                        @endphp
                        <select name="supplier_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter categories">
                            <option value="default">Select One</option>
                            @foreach ($data as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        @error('product_code')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Product Code</label>
                        <input name="product_code" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Product Code">
                    </div>

                    <div class="form-group">
                        @error('product_quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Product Quantity</label>
                        <input name="product_quantity" type="number" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Product Quantity">
                    </div>

                    <div class="form-group">
                        @error('product_warehouse')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Select Product Warehouse</label>
                       
                        <select name="product_warehouse" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter Product Warehouse">
                            <option value="default">Select One</option>                         
                                <option value="1">1</option>                          
                                <option value="2">2</option>                          
                                <option value="3">3</option>                          
                                <option value="4">4</option>                          
                        </select>
                    </div>

                    <div class="form-group">
                        @error('product_route')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Select Product Warehouse Route</label>
                       
                        <select name="product_route" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           >
                            <option value="default">Select One</option>                         
                                <option value="A">A</option>                          
                                <option value="B">B</option>                          
                                <option value="C">C</option>                          
                                <option value="D">D</option>                          
                                <option value="E">E</option>                                                                                 
                        </select>
                    </div>


                    <div class="form-group">
                        @error('buy_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Buy Date</label>
                        <input name="buy_date" type="date" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Buy Date">
                    </div>

                    <div class="form-group">
                        @error('expire_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Expire Date</label>
                        <input name="expire_date" type="date" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" >
                    </div>

                    <div class="form-group">
                        @error('buying_price	')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Buying Price</label>
                        <input name="buying_price" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Buying Price">
                    </div>

                    <div class="form-group">
                        @error('selling_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Selling Price</label>
                        <input name="selling_price" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Selling Price">
                    </div>

                    <div class="form-group">
                        @error('product_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Add Photo</label>
                        <input name="product_image" type="file" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Choose photo">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>


    </div>
@endsection
