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
              <li class="breadcrumb-item active">{{trans('admin.paramedicsTable')}}</li>
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
              <h3 class="card-title">{{trans('admin.paramedicsTable')}}</h3>
              <a id="addAnyThing" href="{{route('users.create')}}" class="btn btn-block btn-success">{{trans('admin.addParamedic')}}</a>
            </div>
            @include('includes.messages')
            <div class="card-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>{{trans('admin.id')}}</th>
                  <th>{{trans('admin.NameParamedic')}}</th>
                  <th>{{trans('admin.email')}}</th>
                  <th>{{trans('admin.phone')}}</th>
                  <th>{{trans('admin.JobTitle')}}</th>
                  <th>{{trans('admin.codeJob')}}</th>
                  <th>{{trans('admin.action')}}</th>
                </tr>
                </thead>
                <tbody>
                  @if(count($users) > 0)
                    <?php $i=1; ?>
                    @foreach($users as $user)

                        <tr>
                          <td><?php echo $i ?></td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->phone}}</td>
                          <td>{{$user->JobTitle->name}}</td>
                          <td>{{$user->codeJob}}</td>
                          <td>
                            <div class="btn-group">

                              <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning"><i style="color:#fff"  class="fas fa-edit"></i></a>
                              <form action="{{route('users.destroy',$user->id)}}" method="POST">
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
