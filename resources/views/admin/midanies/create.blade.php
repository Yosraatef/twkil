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
              <li class="breadcrumb-item active">{{trans('admin.addManager') }}</li>
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
            <h3 class="card-title">{{trans('admin.addMidanies') }}</h3>
          </div>
          <form role="form" action="{{route('midanies.store')}}" method="post"
                enctype="multipart/form-data">
               {{ csrf_field()}}
                 @include('includes.messages')
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{trans('admin.NameMidani')}}</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="{{trans('admin.NameMidaniValidation')}}" required>
                  </div>

                  <div class="form-group">
                    <label for="phone">{{trans('admin.phone') }} </label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="{{trans('admin.phoneValidation') }}" required>
                  </div>
                  <div class="form-group">
                    <label for="codeJob">{{trans('admin.codeJob') }} </label>
                    <input type="text" class="form-control" name="codeJob" id="codeJob" placeholder="{{trans('admin.codeJobvalidation') }}" required>
                  </div>
                </div>

                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pass">{{trans('admin.pass') }} </label>
                    <input type="password" class="form-control" name="password" id="pass" placeholder="{{trans('admin.pass_validation') }}" required>
                  </div>
                  <div class="form-group">
                    <label for="email">{{trans('admin.email') }} </label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="{{trans('admin.emailValidation') }}" required>
                  </div>
                  <div class="form-group">
                    <label>{{trans('admin.jobTitle')}}</label>
                    <select class="form-control select2" style="width: 100%;" name="jobTitle_id" required>
                      @foreach($jobTitles as $jobTitle)
                        <option value="{{$jobTitle->id}}">{{ $jobTitle->name}}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <!-- /.row -->

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
