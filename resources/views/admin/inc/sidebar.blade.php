 
 
    <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
              @if(!empty($admin['avatar']) ||  $admin['avatar'] !== 'default.png')
                <img src="{{ asset('/uploads/') }}/{{Auth::guard('admin')->user()->avatar}}" style ="width: 45px; height: 45px" class="img-circle" alt="User Image">
              @else
                <img src="{{ asset('/uploads') }}/avatar/default.png" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ $admin->name }}</span>
              @endif
          
        </div>
        <div class="pull-left info">
          <p>{{ auth()->guard('admin')->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
         

 

        <li class="treeview ">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Articles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/article/create') }}"><i class="fa fa-circle-o"></i> Add New Articles</a></li>
            <li><a href="/admin/article"><i class="fa fa-circle-o"></i> All Articles</a></li>
          </ul>
        </li>
  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/category/create"><i class="fa fa-circle-o"></i> Add New Category</a></li>
            <li><a href="/admin/category"><i class="fa fa-circle-o"></i> All Category</a></li> 
          </ul>
        </li>



 

  


 
    </section>
    <!-- /.sidebar -->
  </aside> 