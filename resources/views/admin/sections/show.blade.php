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
                  <th>{{trans('admin.name')}}</th>
                  <th>{{trans('admin.status')}}</th>
                  <th>{{trans('admin.action')}}</th>
                </tr>
                </thead>
                <tbody>
                  @if(count($sections) > 0)
                    @foreach($sections as $section)
                        <tr>
                          <td>{{$section->id}}</td>
                          <td>{{$section->name}}</td>
                          <td>
                            @if($section->status == 1)
                              <a class="updateSectionStatus" id="section-{{$section->id}}" section_id="{{$section->id}}" href="javascript:void(0)">{{trans('admin.active')}}</a>
                            @else
                            <a class="updateSectionStatus" id="section-{{$section->id}}" section_id="{{$section->id}}" href="javascript:void(0)">{{trans('admin.inactive')}}</a>
                            @endif
                          </td>
                          <td>action</td>
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
