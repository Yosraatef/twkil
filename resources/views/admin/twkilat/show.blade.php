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
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin.home') }}</a></li>
              <li class="breadcrumb-item active">{{trans('admin.sectinTable')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{trans('admin.sectinTable')}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>{{trans('admin.id')}}</th>
                  <th>{{trans('admin.nameCenter')}}</th>
                  <th>{{trans('admin.mowkel')}}</th>
                  <th>{{trans('admin.noAgencyMowkel')}}</th>
                  <th>{{trans('admin.mtawkel')}}</th>
                  <th>{{trans('admin.noAgencyMtawkel')}}</th>
                  <th>{{trans('admin.date')}}</th>
                </tr>
                </thead>
                <tbody>
                  @if(count($agencies) > 0)
                    @foreach($agencies as $agency)
                        <tr>
                          <td>{{$agency->id}}</td>
                          <td>{{$agency->center_id}}</td>
                          <td>{{$agency->mowkel_id}}</td>
                          <td>{{$agency->noAgencyMowkel}}</td>
                          <td>{{$agency->mtawkel_id}}</td>
                          <td>{{$agency->noAgencyMtawkel}}</td>
                          <td>{{$agency->date}}</td>
                        </tr>
                    @endforeach
                  @endif
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

</div>
<!-- ./wrapper -->
@push('js')

@endpush
@endsection
