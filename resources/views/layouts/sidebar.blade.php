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
                <i class="bi bi-journal-text"></i><span>Form</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link {{ Route::currentRouteNamed('employees.create') ? '' : 'collapsed' }}" href="{{ route('employees.create') }}">
                        <i class="bi bi-person-plus fs-4"></i><span>Karyawan</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Route::currentRouteNamed('pelanggaran.create') ? '' : 'collapsed' }}" href="{{ route('pelanggaran.create') }}">
                        <i class="bi bi-file-earmark-plus fs-4"></i><span>Pelanggaran</span>
                    </a>
                </li>

            </ul>
        </li>

     
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tabel</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link {{ Route::currentRouteNamed('absensi.index') ? '' : 'collapsed' }}" href="{{ route('absensi.index') }}">
                        <i class="bi bi-calendar-check fs-6"></i><span>Absensi</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link {{ Route::currentRouteNamed('employees.index') ? '' : 'collapsed' }}" href="{{ route('employees.index') }}">
                        <i class="bi bi-person fs-6"></i><span>Karyawan</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link {{ Route::currentRouteNamed('pelanggaran.index') ? '' : 'collapsed' }}" href="{{ route('pelanggaran.index') }}">
                        <i class="bi bi-exclamation-triangle fs-6"></i><span>Pelanggaran</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link {{ Route::currentRouteNamed('employee.golongan') ? '' : 'collapsed' }}" href="{{ route('employees.golongan') }}">
                        <i class="bi bi-tags fs-6"></i><span>Golongan</span>
                    </a>
                </li>

            </ul>
        </li>

        <li>
            <a class="nav-link {{ Route::currentRouteNamed('employee.archive') ? '' : 'collapsed' }}" href="{{ route('employees.archive') }}">
                <i class="bi bi-archive fs-6"></i><span>Arsip</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar -->