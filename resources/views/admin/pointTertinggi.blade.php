@extends('layouts.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-light">
                        Point Tertinggi
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
                            <form action="{{route('pointTertinggiPost')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-auto">
                                            <label for="bulan">Bulan:</label>
      						<select class="form-control" id="bulan" name="bulan">
        						<option value="1">Januari</option>
        						<option value="2">Februari</option>
        						<option value="3">Maret</option>
        						<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
      						</select>
                                        </div>
					<div class="col-sm-auto">
					    <label for="tahun">Tahun:</label>
      						<select class="form-control" id="tahun" name="tahun">
        						<option value="2021">2021</option>
        						<option value="2022">2022</option>
      						</select>
					</div>
                                    </div>
                                </div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-auto">
							<button type="submit" class="btn btn-primary" id="saveBtn" value="create">Search</button>
						</div>
					</div>
				</div>
                            </form>
				@if(!empty($points))
				<center><b>Point Tertinggi Bulan {{ $bulan }} - Tahun {{ $tahun }}</b></center>
				<table class="table table-bordered dt-responsive nowrap" id="it-table" style="width: 100%">
                                   <tr>
                                       <th>Nama Pengguna</th>
                                       <th>Point</th>
                                       <th>Bulan</th>
                                   </tr>
                                @foreach($points as $point)
                                   <tr>
                                        <td>{{ $point->name }}</td>
                                        <td>{{ $point->jumlah }}</td>
                                        <td>{{ $bulan."-".$tahun }}</td>
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

