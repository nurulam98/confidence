@extends('layouts.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-light">
                        Data User
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered dt-responsive nowrap" id="admin-table" style="width: 100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
			    <th>Kota</th>
                            <th>Username</th>
                            <th>No Handphone</th>
			    <th>Points Bulan Ini</th>
			    <th>Points Keseluruhan</th>
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
    <script>
        $(function() {
            $('#admin-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: 'json',
                columns: [
                    // {   // Responsive control column
                    //     data: null,
                    //     defaultContent: '',
                    //     className: 'control',
                    //     orderable: false
                    // },
                    // {   // Checkbox select column
                    //     data: null,
                    //     defaultContent: '',
                    //     className: 'select-checkbox',
                    //     orderable: false
                    // },
                    { data: 'DT_RowIndex', name: 'no'},
                    { data: 'name', name: 'name'},
                    { data: 'email', name: 'email'},
		    { data: 'kota', name: 'kota'},
                    { data: 'username', name: 'username'},
                    { data: 'no_handphone', name: 'no_handphone'},
		    { data: 'PointMonth', name:'PointMonth'},
		    { data: 'points', name:'points'}
                ]
            }).columns.adjust()
            .responsive.recalc();
        });
    </script>
@endpush

