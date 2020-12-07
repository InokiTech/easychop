@extends('layouts.template')

@section('title','Dashboard')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          @if(auth()->user()->status == 'pending')
          <div class="col-12 col-sm-12 col-md-12">
              <div class="notice-alert alert-danger h6">
                Your vendor account is not approved yet. Click on the  <a href="#" class="notice-alert-link">Update Store Information</a> link to update your store information.
              </div>
          </div>
          @endif
          @if(auth()->user()->status == 'active')
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box shadow p-3">
              <a href="/profile"  Class="info-box-icon bg-dark elevation-1" data-toggle="tooltip" data-placement="bottom" title="See Profile"><i class="fa fa-user-circle-o"></i></a>

              <div class="info-box-content">
                <span class="info-box-text">Profile</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box shadow p-3">
              <a href="{{route('activity-log.index')}}"  Class="info-box-icon bg-navy elevation-1" data-toggle="tooltip" data-placement="bottom" title="See Activity Log"><i class="fa fa-list"></i></a>

              <div class="info-box-content">
                <span class="info-box-text">Activity Log</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box shadow p-3">
              <a href="/order"  Class="info-box-icon bg-info elevation-1" data-toggle="tooltip" data-placement="bottom" title="See Premium Content"><i class="fa fa-user-circle-o"></i></a>

              <div class="info-box-content">
                <span class="info-box-text">Orders</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          @endif
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
