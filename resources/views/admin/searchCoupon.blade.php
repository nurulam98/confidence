@extends('layouts.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-light">
                        Search Kode Kupon
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            @if (Session::has('success'))
                                <div class="alert alert-dismissible alert-success">{{ Session::get('success') }}</div>
                            @endif
                        <div class="container">
                            <form action="{{route('searchCouponPost')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-auto">
                                            <input type="text" name="coupon" class="form-control" placeholder="Kode Kupon">
                                        </div>
                                        <div class="col-sm-auto">
                                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
			@if(!empty($coupons))
				<table class="table table-bordered dt-responsive nowrap" id="it-table" style="width: 100%">
 				   <tr>
   				       <th>Coupon</th>
    				       <th>Nama Pengguna</th>
    				       <th>Status</th>
				       <th>Dipakai Tanggal</th>
 				   </tr>
				@foreach($coupons as $coupon)
  				   <tr>
    					<td>{{ $coupon->coupon }}</td>
    					<td>{{ $coupon->name == null ? "-" : $coupon->name }}</td>
    					<td>{{ $coupon->status == "Valid" ? "Available" : "Unavailable" }}</td>
					<td>{{ $coupon->updated_at }}</td>
				  </tr>
				@endforeach
				</table>
			@endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
