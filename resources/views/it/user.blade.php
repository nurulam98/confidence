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
                        <div class="container">
                            <a class="btn btn-primary" href="javascript:void(0)" id="createNewCustomer" style="margin-bottom: 10px"> Create New Customer</a>
                        </div>
                        <table class="table table-bordered dt-responsive nowrap" id="it-table" style="width: 100%">
                            <thead>
                            <tr>
                                <th>Nama Pengguna</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>No Handphone</th>
				<th>Action</th>
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
    <div class="modal fade" id="modal-add-user" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="userForm" name="userFrom" class="form-horizontal">
                    <input type="hidden" name="User_id" id="User_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="name" class="col-sm-4 control-label">Nama</label>
                                <div class="col-sm-auto">
                                    <input id="name" type="text" name="name" class="form-control" placeholder="Nama">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="email" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-auto">
                                    <input id="email" type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="address" class="col-sm-4 control-label">Address</label>
                                <div class="col-sm-auto">
                                    <input id="address" type="text" name="address" class="form-control" placeholder="Alamat">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="kota" class="col-sm-4 control-label">Kota</label>
                                <div class="col-sm-auto">
                                    <input id="kota" type="text" name="kota" class="form-control" placeholder="Kota">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="no_handphone" class="col-sm-4 control-label">No Handphone</label>
                                <div class="col-sm-auto">
                                    <input id="no_handphone" type="text" name="no_handphone" class="form-control" placeholder="Nomor Seluler">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="role" class="col-sm-4 control-label">Role</label>
                                <div class="col-sm-auto">
                                    <select id="role" class="form-control" name="role">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                        <option value="it">IT</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="username" class="col-sm-4 control-label">Username</label>
                                <div class="col-sm-auto">
                                    <input id="username" type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="password" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-auto">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
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
           let table =  $('#it-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: 'userJson',
                columns: [
                    { data: 'name', name: 'name'},
                    { data: 'email', name: 'email'},
                    { data: 'username', name: 'username'},
                    { data: 'role', name: 'role'},
                    { data: 'status', name: 'status'},
                    { data: 'address', name: 'address'},
                    { data: 'kota', name: 'kota'},
                    { data: 'no_handphone', name: 'no_handphone'},
		    { data: 'action', name: 'action', orderable:false, searchable:false},
                ]
            }).columns.adjust()
                .responsive.recalc();

            $('#createNewCustomer').click(function(){
                $('#saveBtn').val("create-Customer");
                $('#User_id').val('');
                $('#userFrom').trigger("reset");
                $('#modelHeading').html("Buat Akun Baru");
                $('#modal-add-user').modal('show');
            });

            $('body').on('click', '.editUser', function () {
                let User_id = $(this).data('id');
                let pathname = window.location.pathname;
                $.get(pathname + '/edit/' +User_id, function (data) {
                    $('#modelHeading').html("Ubah User");
                    $('#saveBtn').val("edit-user");
                    $('#modal-add-user').modal('show');
                    $('#User_id').val(data.id);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#kota').val(data.kota);
                    $('#address').val(data.address);
                    $('#no_handphone').val(data.no_handphone);
                    $('#username').val(data.username);
                    $('#role').val(data.role).trigger('change');
                })
            });

            $('#saveBtn').click(function (e){
               e.preventDefault();
               $(this).html('Mengirim...');
               $.ajax({
                   type: "POST",
                   url: "user/addUser",
                   data: $('#userForm').serialize(),
                   dataType: 'json',
                   success: function (data) {
                       $('#userForm').trigger("reset");
                       $('#modal-add-user').modal('hide');
                       table.draw();
                   },
                   error: function (data) {
                       console.log('error: ', data);
                       $('#saveBtn').html('Save Changes');
                   }
               });
            });

            $('body').on('click','.confirmUser', function () {
                var User_id = $(this).data('id');
                confirm("Verifikasi Email Ini ? ");

                $.ajax({
                   type: "POST",
                   url: "user/confirmUser/"+User_id,
                   success: function (data) {
                       table.draw();
                   },
                    error: function (data) {
                       console.log('Error:', data)
                    }
                });
            });

            $('body').on('click','.deleteUser', function () {
                var User_id = $(this).data('id');
                confirm("Hapus Akun Ini ? ");

                $.ajax({
                    type: "POST",
                    url: "user/deleteUser/"+User_id,
                    success: function (data) {
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data)
                    }
                });
            });

        });
    </script>
@endpush

