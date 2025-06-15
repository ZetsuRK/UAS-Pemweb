@extends('layouts.sbadmin2')

@section('title', 'Dashboard')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Selamat Datang
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->name }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
