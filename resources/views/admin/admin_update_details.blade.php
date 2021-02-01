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
            <li class="breadcrumb-item active">{{trans('admin.update_details') }}</li>
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
              <h3 class="card-title">{{trans('admin.update_details') }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('updateAdminDetails')}}" method="post" name="updateAdminDetails" id="updateAdminDetails" enctype="multipart/form-data">
              @csrf
                @include('includes.messages')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">{{trans('admin.type_admin') }} </label>
                  <input name="type" type="text" class="form-control" readonly="" value="{{Auth::guard('admin')->user()->type}}">
                </div>
                <div class="form-group">
                  <label for="email">{{trans('admin.email') }} </label>
                  <input name="email" type="email" class="form-control" readonly="" value="{{Auth::guard('admin')->user()->email}}">
                </div>
                <div class="form-group">
                  <label for="name">{{trans('admin.name_admin') }}</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter Admin Name "  value="{{Auth::guard('admin')->user()->name}}"required>
                </div>
                <div class="form-group">
                  <label for="phone">{{trans('admin.phone_admin') }}</label>
                  <input type="text" class="form-control" name="phone" id="phone" value="{{Auth::guard('admin')->user()->phone}}" placeholder="Enter Phone Admin" >
                </div>
                <div class="form-group">
                  <label for="image">{{trans('admin.profile_admin_image') }}</label>
                  <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image" >
                  @if(!empty(Auth::guard('admin')->user()->image))
                  <a target="_blank" href="{{asset('images/admin_images/admin_photos/'.Auth::guard('admin')->user()->image)}}">view Image</a>
                  <input type="hidden" name="current_admin_image" value="">
                  @endif
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
