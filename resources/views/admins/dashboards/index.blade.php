@extends('layouts.admins.admin')

@section('admin-tittle')Dashboard @endsection

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page"><span>Dashboard</span></li>
@endsection

@section('content')

    <div class="row layout-top-spacing">

        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one">
                <div class="widget-heading">
                    <h5 class="">Revenue</h5>
                </div>

            </div>
        </div>

    </div>

@endsection
