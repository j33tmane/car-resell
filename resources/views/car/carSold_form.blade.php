@extends('layouts.master')
@section('title')
    Sold Car
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Forms
        @endslot
        @slot('title')
            Car Sold
        @endslot
    @endcomponent

<div class="col-lg-6 col-md-6 col-sm-12">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Sold Vehicle</h5>
        </div>
        <div class="card-body">
          <form method="post" action="" enctype="multipart/form-data">
            <center>
                <img src="" alt="img"  class="rounded" width="300px"><br>
            
                <h5>TATA | Indica </h5>
            2007 ♦ Petrol ♦ 90000<small style="font-size:7px">KM</small> ♦ ₹ 500000</center><hr>


            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Customer Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter customer name" required="">
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Customer Mobile No.</label>
              <input type="text" class="form-control" name="mob" maxlength="10"  placeholder="Enter customer mobile no." required="">
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Customer Address</label>
              <input type="text" class="form-control" name="add" placeholder="Enter customer address" required="">
            </div>
            
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Solded Price <i class="bx bx-rupee"></i></label>
              <input type="text" class="form-control" name="amount" placeholder="₹ 5,00,000" required="">
            </div>
            
            <input type="hidden" name="cid" value="3726187">
            <input type="hidden" name="did" value="822357">
            <br>
            <button type="submit" name="addSold" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
    </div>

@endsection