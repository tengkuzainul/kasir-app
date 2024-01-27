<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <p class="h3 text-dark"><i class="fa fa-user"></i></p>
        </div>
        <div class="info">
            <a href="#" class="d-block font-weight-normal">{{ Auth::user()->email }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
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
            <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            @hasanyrole('kepalaToko|kasir')
                <li class="nav-item">
                    <a href="{{ route('user') }}" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-fill"></i>
                        <p>Manajemen Users</p>
                    </a>
                </li>
            @endhasanyrole
            @hasanyrole('admin|kasir')
                <li class="nav-item">
                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                        <i class="nav-icon bi bi-person-add"></i>
                        <p>Customer</p>
                    </a>
                </li>
            @endhasanyrole
            @hasanyrole('kepalaToko|admin|kasir')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-boxes"></i>
                        <p>
                            Manajemen Barang
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('kategori') }}"
                                class="nav-link {{ request()->is('kategori') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('barang') }}" class="nav-link {{ request()->is('barang') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Barang</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endhasanyrole
            @hasanyrole('kepalaToko|admin|kasir')
                <li class="nav-item">
                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                        <i class="nav-icon bi bi-box"></i>
                        <p>Return Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('barangMasuk') }}"
                        class="nav-link {{ request()->is('barangMasuk') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-box-arrow-in-left"></i>
                        <p>Barang Masuk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('barangKeluar') }}"
                        class="nav-link {{ request()->is('barangKeluar') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-box-arrow-right"></i>
                        <p>Barang Keluar</p>
                    </a>
                </li>
            @endhasanyrole
            @hasanyrole('kepalaToko|Kasir')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-cash-coin"></i>
                        <p>Transaksi</p>
                    </a>
                </li>
            @endhasanyrole
            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-file-earmark-fill"></i>
                    <p>
                        Laporan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Penjualan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Barang Masuk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Barang Keluar</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
