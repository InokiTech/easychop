@extends('layouts.template')

@section('title','Edit Permission')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Permissions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('permission.index')}}">Permission</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
        <!-- right column -->
        <div class="col-md-7 mx-auto">
            @include('layouts.includes.alerts')
            <form class="form-horizontal" method="POST" action="{{route('permission.update',$permission->id)}}">
                @csrf
                @method('PUT')
              <!-- Permission Creation -->
                  <div class="card">
                    <div class="card-header with-border">
                      Permission
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group ">
                            <div  class="col-sm-12">
                                <input type="text" value="{{$permission->name}}"name="name" class="form-control" id="password" placeholder="Name of Permission">
                                @if ($errors->has('permission'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('permission') }}</strong>
                                  </span>
                                @endif
                            </div>
                      </div>
                      <div class="col-sm-8 mx-auto"><button type="submit" class="btn btn-success col-sm-12">Edit Permission</button></div>
                    </div>
                      <!-- /.card-body -->
              <!-- Permission Creation -->
                </div>
            </form>
            <!-- form end -->
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (right) -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
