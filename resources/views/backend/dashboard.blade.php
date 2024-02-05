@extends('layouts.b-master')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Total Users Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('/admin/users') }}" class="card border-left-primary shadow h-100 py-1 text-decoration-none">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{-- <i class="fas fa-users mr-2"></i> --}}
                                <img src="{{ asset('assets/img/Icons/user lists.svg') }}" class="mb-1 mr-1" width="25px" alt="">
                                {{ $users->count() }}</div>
                        </div>
                        <div class="col-auto">
                            {{-- <i class="fas fa-users fa-2x text-gray-300"></i> --}}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Authors Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('/admin/authors') }}" class="card border-left-success shadow h-100 py-1 text-decoration-none">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Authors</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><img src="{{ asset('assets/img/Icons/Author.svg') }}" class="mb-1 mr-1" width="25px" alt="">{{ $authors->count() }}</div>
                        </div>
                        <div class="col-auto">
                            {{-- <i class="fas fa-users fa-2x text-gray-300"></i> --}}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Order Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('admin/orders/') }}" class="card border-left-warning shadow h-100 py-1 text-decoration-none">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><img src="{{ asset('assets/img/Icons/Order.svg') }}" class="mb-1 mr-1" width="25px" alt="">{{ $orders->count() }}</div>
                        </div>
                        <div class="col-auto">
                            {{-- <i class="fas fa-book fa-2x text-gray-300"></i> --}}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Novels Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ url('admin/book/') }}" class="card shadow h-100 py-1 text-decoration-none" style="border-left: 4px solid #FE5092">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #FE5092;">
                                Total Novels</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><img src="{{ asset('assets/img/Icons/Novel.svg') }}" class="mb-1 mr-1" width="25px" alt="">{{ $novels->count() }}</div>
                        </div>
                        <div class="col-auto">
                            {{-- <i class="fas fa-shopping-cart fa-2x text-gray-300"></i> --}}
                        </div>
                    </div>
                </div>
            </a>
        </div>


    </div>
</div>
@endsection
