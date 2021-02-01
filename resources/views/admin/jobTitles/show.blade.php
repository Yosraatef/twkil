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
              <li class="breadcrumb-item active">{{trans('admin.jobTitles')}}</li>
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
              <h3 class="card-title">{{trans('admin.jobTitle')}}</h3>
              <a id="addAnyThing" href="{{route('jobTitles.create')}}" class="btn btn-block btn-success">{{trans('admin.addjobTitle')}}</a>
            </div>
                @include('includes.messages')
            <div class="card-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>{{trans('admin.id')}}</th>
                  <th>{{trans('admin.jobTitle')}}</th>
                  <th>{{trans('admin.action')}}</th>
                </tr>
                </thead>
                <tbody>
                  @if(count($jobTitles) > 0)
                  <?php $i=1; ?>
                    @foreach($jobTitles as $jobTitle)
                        <tr>
                          <td><?php echo $i ?></td>
                          <td>{{$jobTitle->name}}</td>
                          <td>
                            <div class="btn-group">

                              <a href="{{route('jobTitles.edit', $jobTitle->id)}}" class="btn btn-warning"><i style="color:#fff"  class="fas fa-edit"></i></a>
                              <form action="{{route('jobTitles.destroy',$jobTitle->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                              <button  class="btn btn-danger"><i style="color:#fff" class="fas fa-trash-alt"></i></button>
                            </form>
                            </div>
                          </td>
                        </tr>
                      <?php $i++;?>
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
