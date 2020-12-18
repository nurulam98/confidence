@extends('layouts.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="list-group">
                        <a href="{{ route('exportCouponMonth') }}" class="list-group-item {{ (\Request::route()->getName() == 'exportCouponMonth') ? 'active' : ''}}">Bulan</a>
                        <a href="{{ route('exportCouponYear') }}" class="list-group-item {{ (\Request::route()->getName() == 'exportCouponYear') ? 'active' : ''}}">Tahun</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header bg-light">
                            Data Reporting
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <button type="button" href="javascript:void(0)" class="btn btn-primary" id="month" style="margin-bottom: 10px">1 Bulan</button>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary" id="months" style="margin-left: auto;margin-top: auto">Lebih 1 Bulan</button>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="cols-sm-12">
                                        <form action="{{route('exportCouponPost')}}" method="POST">
                                            @csrf
                                            <div class="form-group date" id="form-month">
                                                {{--<label for="name" class="col-sm-2 control-label">Bulan</label>--}}
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <button class="btn btn-outline-secondary" type="button" style="border-radius: 5px"><span class="icon icon-event"></span></button>
                                                    </div>
                                                    <input placeholder="masukkan Bulan Awal" type="text" class="form-control datepicker col-sm-auto" name="awal">
                                                </div>
                                            </div>
                                            <div class="form-group date" id="form-months">
                                                {{--<label for="name" class="col-sm-2 control-label">Bulan</label>--}}
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <button class="btn btn-outline-secondary" type="button" style="border-radius: 5px"><span class="icon icon-event"></span></button>
                                                    </div>
                                                    <input placeholder="masukkan Bulan Akhir" type="text" class="form-control datepicker col-sm-auto" name="akhir">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Download</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function(){
            $(".datepicker").datepicker({
                format: 'mm-yyyy',
                autoclose: true,
                todayHighlight: true,
                startView: "months",
                minViewMode: "months"
            });
            $('#form-months').hide();
            $('#form-years').hide();
            $('#month').click(function () {
                $('#form-month').show();
                $('#form-months').hide();
            });
            $('#months').click(function () {
                $('#form-months').show();
                $('#form-month').show();
            });
        });
    </script>
@endpush
