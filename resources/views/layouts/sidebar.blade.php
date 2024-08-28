  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link {{ Route::currentRouteNamed('dashboard') ? '' : 'collapsed' }} @php $title = " Dashboard" @endphp" href="{{ route('dashboard') }}">
                  <i class="bi bi-grid-fill"></i>
                  <span>Dashboard</span>
              </a>
          </li>


          <li class="nav-item">
              <a class="nav-link {{ Route::currentRouteNamed('employees.index') ? '' : 'collapsed' }}" href="{{ route('employees.index') }}">
                  <i class="bi bi-layers-fill"></i>
                  <span>Data Karyawan</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link  {{ Route::currentRouteNamed('employees.create') ? '' : 'collapsed' }}" href="{{ route('employees.create') }}">
                  <i class="ri-inbox-archive-fill"></i>
                  <span>Tambah Karyawan</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ Route::currentRouteNamed('pelanggaran.index') ? '' : 'collapsed' }}" href="{{ route('pelanggaran.index') }}">
                  <i class="bi bi-layers-fill"></i>
                  <span>Data pelanggaran</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link  {{ Route::currentRouteNamed('pelanggaran.create') ? '' : 'collapsed' }}" href="{{ route('pelanggaran.create') }}">
                  <i class="ri-inbox-archive-fill"></i>
                  <span>Tambah pelanggaran</span>
              </a>
          </li>

  </aside>