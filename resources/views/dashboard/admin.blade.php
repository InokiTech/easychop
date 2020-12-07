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
      @include('layouts.includes.alerts')
      @role('admin')
      <!-- Info boxes -->
        <div class="row mb-2">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box shadow p-3">
              <a href="{{route('user.index')}}"  Class="info-box-icon bg-dark elevation-1" data-toggle="tooltip" data-placement="bottom" title="See All Users"><i class="fa fa-users"></i></a>

              <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number lead">
                  {{$users}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box shadow p-3">
              <a href="{{route('user.index')}}"  Class="info-box-icon bg-navy elevation-1" data-toggle="tooltip" data-placement="bottom" title="See Users"><i class="fa fa-user-plus"></i></a>

              <div class="info-box-content">
                <span class="info-box-text">New Users</span>
                <span class="info-box-number lead">
                  {{$latest_users_count}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>


          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box shadow p-3">
              <a href="{{route('role.index')}}"  Class="info-box-icon bg-primary elevation-1" data-toggle="tooltip" data-placement="bottom" title="See Roles"><i class="fa fa-tag"></i></a>

              <div class="info-box-content">
                <span class="info-box-text">Roles</span>
                <span class="info-box-number lead">
                  {{$roles}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


       <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box shadow p-3">
            <a href="{{route('activity-log.index')}}"  Class="info-box-icon bg-success elevation-1" data-toggle="tooltip" data-placement="bottom" title="See Activity Log"><i class="fa fa-list"></i></a>

            <div class="info-box-content">
              <span class="info-box-text">Activity Log</span>
              <span class="info-box-number lead">
                {{$activities}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->


        </div>
        <!-- /.row -->



      <div class="row">

        <div class="col-lg-7 col-xs-11 h-100">
          <!-- small box -->
          <div class="card bg-white">
            <div class="card-header bg-primary">
              Registration History
            </div>
            <div class="card-body">
              {!! $latestUser->container() !!}
              @if($latestUser)
                {!! $latestUser->script() !!}
              @endif
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-5 col-xs-11 h-100">
          <!-- small box -->
          <div class="card bg-white">
            <div class="card-header bg-primary">
              New Users
              <span class="pull-right"><a href="/user" class=" text-white hover-danger">View all</a></span>
            </div>
            <div class="card-body p-0">
              <div class="row">
                <div class="col-md-12">
                  <ul class="list-group list-group-flush">
                    @if(count($latest_users) > 0)
                        @foreach($latest_users as $latest)
                        <li class="list-group-item">
                          <a href="{{route('user.edit',$latest->id)}}" class="d-flex text-dark no-decoration">
                            <img class="rounded-circle" width="40" height="40" src="{{$latest->avatar}}">
                            <div class="ml-2" style="line-height: 1.5;">
                                <span class="d-block p-0">{{$latest->fullname}}</span>
                                <small class="text-muted">{{$latest->created_at}}</small>
                            </div>
                          </a>
                        </li>
                        @endforeach
                    @else
                    <li class="list-group-item text-center text-muted">
                      <h5><i>No record found</i></h5>
                    </li>
                    @endif
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ./col -->

      </div>
		@endrole('admin')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
