<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('images/admin_images/Logo.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">{{trans('admin.nameProject') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('images/admin_images/admin_photos/'.Auth::guard('admin')->user()->image)}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ ucwords(Auth::guard('admin')->user()->name)}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             <li class="nav-item">

               @if(Session::get('page')=="dashboard")

               <?php $active = "active"; ?>
               @else
               <?php $active = "" ;?>
               @endif
               <a href="{{route('dashboard')}}" class="nav-link {{$active}}">
                 <i class="right fas fa-angle-left"></i>
                 <p>
                  {{trans('admin.main') }}
                 </p>
               </a>
             </li>
        <li class="nav-item has-treeview menu-open">
          @if(Session::get('page')=="settings" || Session::get('page')=="update_admin_details")
          <?php $active = "active"; ?>
          @else
          <?php $active = "" ;?>
          @endif
          <a href="#" class="nav-link {{$active}}">
            <i class="fas fa-cog"></i>
            <p>
              {{trans('admin.Settings') }}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('/admin/settings')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{trans('admin.update_pass') }}</p>
              </a>
            </li>
            <li class="nav-item">
              @if(Session::get('page')=="update_admin_details")

              <?php $active = "active"; ?>
              @else
              <?php $active = "" ;?>
              @endif
              <a href="{{route('updateAdminDetails')}}" class="nav-link {{$active}}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{trans('admin.update_details') }}</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
           @if(Session::get('page')=="worksystems" )
             <?php $active = "active"; ?>
           @else
             <?php $active = "" ;?>
           @endif
           <a href="{{route('worksystems.index')}}" class="nav-link {{$active}}">
            <i class="fas fa-briefcase"></i>
               <p>
                 {{trans('admin.workSystems') }}

               </p>
           </a>
         </li>
         <li class="nav-item has-treeview menu-open">
            @if(Session::get('page')=="jobTitles" )
              <?php $active = "active"; ?>
            @else
              <?php $active = "" ;?>
            @endif
            <a href="{{route('jobTitles.index')}}" class="nav-link {{$active}}">
             <i class="fas fa-briefcase"></i>
                <p>
                  {{trans('admin.jobTitles') }}

                </p>
            </a>
          </li>
         <li class="nav-item has-treeview menu-open">
            @if(Session::get('page')=="centers" )
              <?php $active = "active"; ?>
            @else
              <?php $active = "" ;?>
            @endif
            <a href="{{route('centers.index')}}" class="nav-link {{$active}}">
               <i class="fas fa-clinic-medical"></i>
                <p>
                  {{trans('admin.centers') }}

                </p>
            </a>

          </li>

        <li class="nav-item has-treeview menu-open">
          @if(Session::get('page')=="users" || Session::get('page')=="managers" )
          <?php $active = "active"; ?>
          @else
          <?php $active = "" ;?>
          @endif
          <a href="#" class="nav-link {{$active}}">
            <i class="fa fa-users" aria-hidden="true"></i>
            <p>
              {{trans('admin.users') }}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              @if(Session::get('page')=="users")

              <?php $active = "active"; ?>
              @else
              <?php $active = "" ;?>
              @endif
              <a href="{{route('users.index')}}" class="nav-link {{$active}}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{trans('admin.paramedicsTable') }}</p>
              </a>
            </li>
            <li class="nav-item">
              @if(Session::get('page')=="managers")
              <?php $active = "active"; ?>
              @else
              <?php $active = "" ;?>
              @endif
              <a href="{{route('managers.index')}}" class="nav-link {{$active}}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{trans('admin.managersTable') }}</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
          @if(Session::get('page')=="midani" )
          <?php $active = "active"; ?>
          @else
          <?php $active = "" ;?>
          @endif
          <a href="{{route('midanies.index')}}" class="nav-link {{$active}}">
            <i class="fa fa-user-secret" aria-hidden="true"></i>
            <p>
              {{trans('admin.midanies') }}

            </p>
          </a>

        </li>
        <li class="nav-item has-treeview menu-open">
          @if(Session::get('page')=="agencies" )
          <?php $active = "active"; ?>
          @else
          <?php $active = "" ;?>
          @endif
          <a href="{{route('agencies.index')}}" class="nav-link {{$active}}">
            <i class="fas fa-table"></i>
            <p>
              {{trans('admin.tawkilat') }}
            </p>
          </a>

        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
