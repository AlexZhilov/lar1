  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

                <a class="navbar-brand brand-link" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @can('view', auth()->user())
              <li class="nav-item">
                <a href="{{ route('admin.post.index') }}" class="nav-link">
                  <i class="far fa-calendar-alt nav-icon"></i>
                  <p>Posts</p>
                    <span class="badge badge-info right">2</span>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('article.index') }}" class="nav-link">
                  <i class="far fa-calendar-alt nav-icon"></i>
                  <p>Article</p>
                    <span class="badge badge-info right">2</span>
                </a>
              </li>
            @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
