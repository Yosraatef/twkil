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
              <li class="breadcrumb-item active">{{trans('admin.editParamedic') }}</li>
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
            <h3 class="card-title">{{trans('admin.editParamedic') }}</h3>
          </div>
          <form role="form" action="{{route('users.update',$user->id)}}" method="post"
              enctype="multipart/form-data">
                {{ csrf_field()}}
                {{ method_field('PUT')}}
                 @include('includes.messages')
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{trans('admin.NameParamedic')}}</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="{{trans('admin.NameParamedicValidation')}}" value="{{$user->name}}">
                  </div>
                  <div class="form-group">
                    <label for="pass">{{trans('admin.pass') }} </label>
                    <input type="password" class="form-control" name="password" id="pass" placeholder="{{trans('admin.pass_validation') }}" required>
                  </div>
                  <div class="form-group">
                    <label for="phone">{{trans('admin.phone') }} </label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone}}">
                  </div>
                  <div class="form-group">
                    <label for="codeJob">{{trans('admin.codeJob') }} </label>
                    <input type="text" class="form-control" name="codeJob" id="codeJob" value="{{$user->codeJob}}">
                  </div>
                </div>

                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{trans('admin.nameCenter')}}</label>
                    <select class="form-control select2" style="width: 100%;" name="center_id" required>
                      @foreach($centers as $center)
                        <option value="{{$center->id}}" @if($center->id == $user->center_id )
                     selected
                     @endif>{{ $center->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="email">{{trans('admin.email') }} </label>
                    <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
                  </div>
                  <div class="form-group">
                    <label>{{trans('admin.jobTitle')}}</label>
                    <select class="form-control select2" style="width: 100%;" name="jobTitle_id" required>
                      @foreach($jobTitles as $jobTitle)
                        <option value="{{$jobTitle->id}}" @if($jobTitle->id == $user->jobTitle_id )
                     selected
                     @endif>{{ $jobTitle->name}}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <!-- /.row -->

            </div>

            <div class="card-footer">
               <button type="submit" class="btn btn-primary">{{trans('admin.edit')}}</button>
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
