@extends('homepage')
@section('content')
<div class="container">
    <div class="card " style="width: 35rem;">
        <img height="120" width="120" class="img-top" src="/storage/{{ $data->photo }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><b>Supplier Name:</b>{{ $data->name }}</h5>
          <p class="card-text"><b>Shop Name:</b>  {{ $data->shop_name }}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><b>Supplier Email:</b>{{ $data->email }}</li>
          <li class="list-group-item"><b>Supplier phone:</b>{{ $data->phone }}</li>
          <li class="list-group-item"><b>Supplier Address:</b>{{ $data->address }}</li>
          <li class="list-group-item"><b>Supplier Nid Number:</b>{{ $data->nid_number }}</li>
          @if ( $data->type == 1)
          <li class="list-group-item"><b>Supplier Type:</b>Distributor</li>
          @elseif ( $data->type ==2)
          <li class="list-group-item"><b>Supplier Type:</b>Whole seller</li>
          @else
          <li class="list-group-item"><b>Supplier Type:</b>Brochure</li>
          @endif
         
          <li class="list-group-item"><b>Supplier Bank Holder Name:</b>{{ $data->bank_holder_name }}</li>
          <li class="list-group-item"><b>Supplier Bank Account Number :</b>{{ $data->bank_account_number }}</li>
          <li class="list-group-item"><b>Supplier Bank Name:</b>{{ $data->bank_name }}</li>
          <li class="list-group-item"><b>Supplier Bank Branch Name:</b>{{ $data->bank_branch_name }}</li>
        </ul>
        <div class="card-body">
            <div class="btn-group" role="group" aria-label="Basic example">
                
                <button type="button" class="btn "><a
                    href="{{ url('edit_supplier/' . $data->id) }}"
                    class=" btn btn-sm btn-warning">Edit</a></button>
            <button type="button" class="btn "><a
                    href="{{ url('delete_supplier/' . $data->id) }}"
                    class=" btn btn-sm btn-danger">Delete</a></button>
            </div>
        </div>
      </div>
</div>

@endsection
