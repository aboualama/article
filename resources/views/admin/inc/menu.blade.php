 
<div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
   
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
              @if( $admin['avatar'] !== 'default.png')
                <img src="{{ asset('/uploads/') }}/{{Auth::guard('admin')->user()->avatar}}" class="user-image" alt="User Image">
              @else
                <img src="{{ asset('/uploads') }}/avatar/default.png" class="user-image" alt="User Image"> 
              @endif
              <span class="hidden-xs">{{ admin()->user()->name }}</span>
            </a> 
          </li>
          <li class="user-footer"> 
            <div class="pull-right">
              <a href="{{ url('admin/logout') }}" class="btn btn-danger" style="margin-top: 8px;">Sign out</a>
            </div>
          </li> 

          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>