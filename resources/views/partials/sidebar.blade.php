      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="{{route('dashboard.index')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{route('document.index')}}">
                <i class="fa fa-folder"></i> <span>Documents</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{route('categories.index')}}">
                <i class="fa fa-book"></i> <span>Categories</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{route('comment.index')}}">
                <i class="fa fa-book"></i> <span>Comment</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{route('auteur.index')}}">
                <i class="fa fa-book"></i> <span>Auteur</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>