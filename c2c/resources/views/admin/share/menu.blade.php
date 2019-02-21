     
     
 <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="{{url('system/products')}}"><i class="fa fa-product-hunt"></i> <span>Product</span></a></li>
        <li><a href="{{url('system/vendor')}}"><i class="fa fa-users"></i> <span>Vendor</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-bar-chart"></i> <span>Categories</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('system/category/create')}}">Add Category</a></li>
            <li><a href="{{url('system/category')}}">List Categories</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-bar-chart"></i> <span>Users</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('system/users/create')}}">Add User</a></li>
            <li><a href="{{url('system/users')}}">List Users</a></li>
          </ul>
        </li>
      </ul>