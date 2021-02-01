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
            <li class="breadcrumb-item active">{{trans('admin.dashboard') }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$noUsers}}</h3>

              <p>{{trans('admin.noUsers') }}</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-md" aria-hidden="true"></i>
            </div>
            <a href="{{route('users.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$noManger}}</h3>

              <p>{{trans('admin.noManger') }}</p>
            </div>
            <div class="icon">
              <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <a href="{{route('managers.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$nomidani}}</h3>

              <p>{{trans('admin.nomidani') }}</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-secret" aria-hidden="true"></i>
            </div>
            <a href="{{route('midanies.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$twkilat}}</h3>

              <p>{{trans('admin.twkilat') }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>

            </div>
            <a href="{{route('agencies.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection
