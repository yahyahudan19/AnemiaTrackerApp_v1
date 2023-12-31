
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <div class="navbar-brand-box">
            <a href="index.html" class="logo">
                <i class="mdi mdi-album"></i>
                <span>
                    SI MANJA
                </span>
            </a>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                @if(auth()->user()->role == 'Administrator')

                <li class="menu-title">Menu Utama</li>
                <li>
                    <a href="/admin" class="waves-effect"><i class="mdi mdi-home-analytics"></i><span>Dashboard</span></a>
                </li>
                <li class="menu-title">Feature Management</li>

                <li>
                    <a href="/admin/anemia" class="waves-effect"><i class="mdi mdi-medical-bag"></i><span>Anemia</span></a>
                </li>

                <li>
                    <a href="/admin/edukasi" class="waves-effect"><i class="mdi mdi-youtube"></i><span>Edukasi</span></a>
                </li>

                <li class="menu-title">User Management</li>

                <li><a href="/admin/siswa" class=" waves-effect"><i class="mdi mdi-account-multiple-outline"></i><span>Siswa</span></a></li>

                <li><a href="/admin/user" class=" waves-effect"><i class="mdi mdi-account-circle-outline"></i><span>User</span></a></li>
                @endif

                @if(auth()->user()->role == 'Siswa')
                <li class="menu-title">Menu Utama</li>
                <li>
                    <a href="/siswa" class="waves-effect"><i class="mdi mdi-home-analytics"></i><span>Dashboard</span></a>
                </li>
                <li class="menu-title">Menu Lainnya</li>

                {{-- <li>
                    <a href="/siswa/anemia" class="waves-effect"><i class="mdi mdi-medical-bag"></i><span>Anemia</span></a>
                </li> --}}

                <li>
                    <a href="/siswa/edukasi" class="waves-effect"><i class="mdi mdi-youtube"></i><span>Edukasi</span></a>
                </li>
                <li class="menu-title">USer Management</li>
                <li>
                    <a href="/siswa/profile" class="waves-effect"><i class="mdi mdi-account-circle-outline"></i><span>Profile</span></a>
                </li>
                @endif


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>