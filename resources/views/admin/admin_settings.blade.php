@extends('layouts.admin_layout.admin_layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{trans('admin.dashboard') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin.home') }}</a></li>
            <li class="breadcrumb-item active">{{trans('admin.update_pass') }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{trans('admin.update_pass') }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('updateAdminPass')}}" method="post" name="updateAdminPass" id="updateAdminPass">
              @csrf
                @include('includes.messages')
              <div class="card-body">

              <?php
              /*
                <div class="form-group">
                  <label for="AdminName">Name Admin </label>
                  <input name="email" type="text" id="AdminName" name="AdminName" class="form-control" value="{{$detailsAdmin->name}}">
                </div> */
                ?>
                <div class="form-group">
                  <label for="exampleInputEmail1">{{trans('admin.type_admin') }} </label>
                  <input name="email" type="text" class="form-control" readonly="" value="{{$detailsAdmin->type}}">
                </div>
                <div class="form-group">
                  <label for="email">{{trans('admin.email') }} </label>
                  <input name="email" type="email" class="form-control" readonly="" value="{{$detailsAdmin->email}}">
                </div>
                <div class="form-group">
                  <label for="currentPass">{{trans('admin.current_pass') }} </label>
                  <input type="password" class="form-control" name="currentPass" id="currentPass" placeholder="{{trans('admin.current_pass_validation') }}" required>
                  <span id="chekkCurrentPass"></span>
                </div>
                <div class="form-group">
                  <label for="newPass">{{trans('admin.new_pass') }} </label>
                  <input type="password" class="form-control" name="newPass" id="newPass" placeholder="{{trans('admin.new_pass_validation')}}" required>
                </div>
                <div class="form-group">
                  <label for="confirmPass">{{trans('admin.confirm_pass') }}</label>
                  <input type="password" class="form-control" name="confirmPass" id="confirmPass" placeholder="{{trans('admin.confirm_pass_validation')}}" required>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{trans('admin.edit') }}</button>
              </div>
            </form>
          </div>
          <!-- /.card -->







        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection
