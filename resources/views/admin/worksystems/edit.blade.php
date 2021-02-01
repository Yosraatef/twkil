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
              <li class="breadcrumb-item active">{{trans('admin.addWorkSystem') }}</li>
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
            <h3 class="card-title">{{trans('admin.addWorkSystem') }}</h3>
          </div>
          <form role="form" action="{{route('worksystems.update',$worksystem->id)}}" method="post"
                enctype="multipart/form-data">
                  {{ csrf_field()}}
                 {{ method_field('PUT')}}
                 @include('includes.messages')
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>{{trans('admin.noHours')}}</label>
                    <input name="hours" type="text" class="form-control" id="name" value="{{$worksystem->hours}}">
                  </div>
                </div>
                <div class="col-md-6">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input allowAgency" type="radio" name="is_agency" value="1" @if($worksystem->is_agency == 1) {{'checked'}} @endif>
                          <label class="form-check-label">{{trans('admin.allowAgency')}}</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input allowAgency" type="radio" name="is_agency"  value="0" @if($worksystem->is_agency == 0) {{'checked'}} @endif>
                          <label class="form-check-label">{{trans('admin.notallowAgency')}}</label>
                        </div>
                      </div>
                </div>
                
                <div id="noHours" class="col-md-6" >
                  <div class="form-group">
                    <label>{{trans('admin.noHours')}}</label>
                    <input name="noAgency" type="text" class="form-control" id="noAgency" value="{{$worksystem->noAgency}}" >
                  </div>
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
