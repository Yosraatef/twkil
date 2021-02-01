@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{trans('admin.dashboard') }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{trans('admin.home') }}</a></li>
              <li class="breadcrumb-item active">{{trans('admin.addCenter') }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{trans('admin.addCenter') }}</h3>
          </div>
          <form role="form" action="{{route('centers.store')}}" method="post"
                enctype="multipart/form-data">
               {{ csrf_field()}}
                 @include('includes.messages')
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{trans('admin.nameCenter')}}</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="{{trans('admin.NameCenterValidation')}}" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{trans('admin.noHours')}}</label>
                    <select class="form-control select2" style="width: 100%;" name="workSystem_id" required>
                      @foreach($workSystems as $workSystem)
                        <option value="{{$workSystem->id}}">{{ $workSystem->hours .' '}}{{trans('admin.hour')}}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- /.form-group -->

                </div>
            </div>

            <div class="card-footer">
               <button type="submit" class="btn btn-primary">{{trans('admin.add')}}</button>
            </div>
          </div>

      </form>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

</div>
<!-- ./wrapper -->
@endsection
