@extends('layouts.template')

@section('title','Create Users')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('user.index')}}">Users</a></li>
              <li class="breadcrumb-item active">Create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                  @include('layouts.includes.alerts')
                  <form class="form-horizontal" method="POST" action="/user">
                      @csrf
                    <!-- Contact Details -->
                      <div class="card">
                          <!-- /.card-header -->
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-12 mb-2">
                                <h5 class="pull-right">Contact Details</h5>
                                <hr class="my-4">
                              </div>
                                <hr>
                              <div class="col-md-12">
                                <div class="form-row mb-1">
                                  <div class="col-sm-12">
                                     <label for="name">Full Name</label>
                                      <input type="text" name="fullname" value="{{old('fullname')}}" placeholder="Fullname" class="form-control" id="fullname">
                                      @error('fullname')
                                          <span class="text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                </div>
                                <div class="form-row mb-1">
                                  <div id="birthday" class="col-sm-6">
                                     <label for="name">Birthday</label>
                                      <input type="text" name="birthday" value="{{old('birthday')}}" placeholder="Birthday" class="form-control">
                                      @error('birthday')
                                          <span class="text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                  <div class="col-sm-6">
                                      <div><label class="label-block">Phone</label></div>
                                      <input type="text" name="phone" value="{{ old('phone') }}" class="form-control col-md-12" placeholder="Phone" >
                                      @error('phone')
                                      <span class="text-danger d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                                </div>
                                <div class="form-row mb-1">
                                    <div class="col-sm-6">
                                    <label for="address" class="control-label">Address</label>
                                    <input type="text" name="address" class="form-control" value="{{old('address')}}" id="address" placeholder="Address">
                                    @if ($errors->has('address'))
                                    <span class="text-danger" role="alert">
                                      <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                                    <div class="col-sm-6">
                                        <label for="mobile">Country</label>
                                        <select name="country" value="{{old('country')}}"class="form-control col-md-12">
                                          @foreach($countries as $key => $country)
                                              <option value="{{$country}}">{{$country}}</option>
                                          @endforeach
                                          @if ($errors->has('country'))
                                          <span class="text-danger" role="alert">
                                              <strong>{{ $errors->first('country') }}</strong>
                                          </span>
                                          @endif
                                        </select>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.card-body -->
                      </div>
                    <!-- Contact Details -->
                    <!-- Account Details -->
                      <div class="card">
                              <div class="card-body">
                                  <div class="row">
                                        <div class="col-md-12 mb-2">
                                          <h5 class="pull-right">Login Details</h5>
                                          <hr class="my-4">
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-row">
                                              <div class="col-sm-6">
                                                  <label>Role</label>
                                                  <select name="role" class="form-control">
                                                    @foreach($roles as $role)
                                                    <option  value="{{$role->name}}">{{ucfirst($role->name)}}</option>
                                                    @endforeach
                                                  </select>
                                              </div>
                                           </div>
                                          <div class="form-row">
                                              <div class="col-sm-6">
                                                    <label for="inputEmail3" class="control-label">Email</label>
                                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Email">
                                                    @if ($errors->has('email'))
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                    @endif
                                              </div>

                                              <div class="col-sm-6">
                                                <label for="inputEmail3" class="control-label">Username</label>
                                                <input type="text"  name="username" value="{{old('username')}}" class="form-control" id="username" placeholder="Username">
                                                @if ($errors->has('username'))
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                                @endif
                                              </div>
                                          </div>
                                          <div class="form-row">
                                              <div class="col-sm-6">
                                                <label for="password" class="control-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                                @if ($errors->has('password'))
                                                <span class="text-danger" role="alert">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                              </div>
                                              <div class="col-sm-6">
                                              <label for="password_confirmation" class="control-label">Confirm Password</label>
                                              <input type="password"  name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                                              @if ($errors->has('password_confirmation'))
                                              <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                              </span>
                                              @endif
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-8 mx-auto mt-4">
                                    <button type="submit" class="btn btn-primary col-md-12">Create User</button>
                                  </div>
                              </div>
                            <!-- /.card-body -->
                        </div>
                    <!-- Account Details -->
                  </form>
                  <!-- form end -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
