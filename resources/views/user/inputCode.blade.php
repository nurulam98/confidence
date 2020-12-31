@extends('layouts.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-light">
                        Input Kode Kupon
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
                            <form action="{{route('inputCodePost')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-auto">
                                            <input type="text" name="coupon" class="form-control" placeholder="Kode Kupon">
                                        </div>
                                        <div class="col-sm-auto">
                                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Reedem Kode</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
