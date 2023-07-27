  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">
          <span class="brand-text font-weight-light">{{ __('custom.system_name') }}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <li class="nav-item">
                      <a href="{{ route('admin.dashboard') }}" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              لوحة التحكم
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.project.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-file"></i>
                          <p>
                              التعهدات
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.project-related-crud.index', ['model' => 'ProjectType']) }}"
                          class="nav-link">
                          <i class="nav-icon fas fa-cubes"></i>
                          <p>
                              أنواع التعدات
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.project-related-crud.index', ['model' => 'ProjectArea']) }}"
                          class="nav-link">
                          <i class="nav-icon fas fa-map"></i>
                          <p>
                              المناطق
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.project-related-crud.index', ['model' => 'ProjectSector']) }}"
                          class="nav-link">
                          <i class="nav-icon fas fa-cube"></i>
                          <p>
                              القطاع
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.project-related-crud.index', ['model' => 'ProjectBoard']) }}"
                          class="nav-link">
                          <i class="nav-icon fas fa-chess-board"></i>
                          <p>
                              اللجان
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.project-related-crud.index', ['model' => 'ProjectAction']) }}"
                          class="nav-link">
                          <i class="nav-icon fas fa-bars"></i>
                          <p>
                              الإجراءات
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.report.index') }}"
                          class="nav-link">
                          <i class="nav-icon fas fa-file"></i>
                          <p>
                              التقارير
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
