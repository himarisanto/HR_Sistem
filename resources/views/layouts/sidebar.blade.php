<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Dashboard Menu -->
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteNamed('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Forms Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link {{ Route::currentRouteNamed('employees.create') ? '' : 'collapsed' }}" href="{{ route('employees.create') }}">
                        <i class="bi bi-circle"></i><span>Tambah Karyawan</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Route::currentRouteNamed('pelanggaran.create') ? '' : 'collapsed' }}" href="{{ route('pelanggaran.create') }}">
                        <i class="bi bi-circle"></i><span>Tambah Pelanggaran</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Tables Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link {{ Route::currentRouteNamed('employees.index') ? '' : 'collapsed' }}" href="{{ route('employees.index') }}">
                        <i class="bi bi-layers-fill"></i><span>Data Karyawan</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Route::currentRouteNamed('pelanggaran.index') ? '' : 'collapsed' }}" href="{{ route('pelanggaran.index') }}">
                        <i class="bi bi-layers-fill"></i><span>Data Pelanggaran</span>
                    </a>
                </li>
                <li>
                   
                </li>
            </ul>
        </li>

    </ul>

</aside><!-- End Sidebar -->