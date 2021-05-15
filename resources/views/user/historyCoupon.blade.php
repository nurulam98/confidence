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
                        History Coupon Terpakai
                    </div>
                    <div class="card-body">
                        <div class="container">
                        <table class="table table-bordered dt-responsive nowrap" id="coupon-table" style="width: 100%">
                            <thead>
                            <tr>
                                <th>Coupon</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
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
                ajax: 'historyJson',
                columns: [
                    { data: 'coupon', name: 'coupon'},
                    { data: 'tanggal', name: 'tanggal'},
		    { data: 'jam', name: 'jam'}
                ]
            }).columns.adjust()
                .responsive.recalc();

        });
    </script>
@endpush
