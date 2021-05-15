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
                        Data Coupon
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <a class="btn btn-primary" id="uploadCsv" style="margin-bottom: 10px" data-target="#importCsv" data-toggle="modal"> Import Coupon</a>
			    <a class="btn btn-primary" id="uploadUsedCsv" style="margin-bottom: 10px" data-target="#importUsedCsv" data-toggle="modal"> Import Coupon Used</a>

                        </div>
                        <table class="table table-bordered dt-responsive nowrap" id="coupon-table" style="width: 100%">
                            <thead>
                            <tr>
                                <th>Coupon</th>
                                <th>Status</th>
                                <th>Dipakai</th>
                                <th>Waktu Upload</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="importCsv" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading">Upload Csv</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('couponImport') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="name" class="col-sm-4 control-label">Pilih File Csv</label>
                                <div class="col-sm-auto">
                                    <input type="file" accept=".csv" name="file" class="form-control" required="required">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="create">Upload File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div class="modal fade" id="importUsedCsv" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading">Upload Csv</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('couponUsedImport') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="name" class="col-sm-4 control-label">Pilih File Csv</label>
                                <div class="col-sm-auto">
                                    <input type="file" accept=".csv" name="file" class="form-control" required="required">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="create">Upload File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let table =  $('#coupon-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                paging: true,
                scroller: {
                    loadingIndicator: true
                },
                ajax: 'couponJson',
                columns: [
                    { data: 'coupon', name: 'coupon'},
                    { data: 'status', name: 'status'},
                    { data: 'user_id', name: 'user_id'},
                    { data: 'tanggal', name: 'tanggal'},
                ]
            }).columns.adjust()
                .responsive.recalc();

        });
    </script>
@endpush

