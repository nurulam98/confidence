@extends('layouts.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    @if ($sukses = Session::get('sukses'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $sukses }}</strong>
                        </div>
                    @endif
                    <div class="card-header bg-light">
                        Kupon Import
                    </div>
                    <div class="card-body">
                        <div class="container">
                        <form method="POST" action="{{ route('couponImportAdmin') }}" enctype="multipart/form-data">
                    @csrf
                    	<div class="form-group">
                            <div class="row">
                                <label for="name" class="col-sm-4 control-label">Pilih File Csv</label>
                                <div class="col-sm-auto">
                                    <input type="file" accept=".csv" name="file" class="form-control" required="required">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" value="create">Upload File</button>
                </form>
			</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
