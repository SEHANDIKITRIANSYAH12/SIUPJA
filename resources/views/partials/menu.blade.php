<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme shadow-sm" style="min-height:100vh;">
    <div class="app-brand demo py-3 px-3 mb-2" style="background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%); border-radius: 0 0 1rem 1rem;">
        <!-- Toggle button positioned absolutely -->
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large d-block d-xl-none" style="color:#fff; position: absolute; right: 1rem; top: 50%; transform: translateY(-50%);">
            <i class="align-middle bx bx-chevron-left bx-sm"></i>
        </a>

        <!-- Centered brand link -->
        @role('Administrator')
            <a href="{{ route('admin.dashboard') }}" class="app-brand-link d-flex align-items-center justify-content-center w-100" style="position: relative; text-decoration: none;">
                <span class="app-brand-logo demo me-2" style="font-size:2rem; color:#fff;">
                    <i class="fas fa-tractor"></i>
                </span>
                <span class="app-brand-text demo menu-text fw-bold" style="font-size:1.3rem; color:#fff; letter-spacing:1px; text-transform: uppercase;">SIUPJA</span>
            </a>
        @elserole('Member')
            <a href="{{ route('member.dashboard') }}" class="app-brand-link d-flex align-items-center justify-content-center w-100" style="position: relative; text-decoration: none;">
                <span class="app-brand-logo demo me-2" style="font-size:2rem; color:#fff;">
                    <i class="fas fa-tractor"></i>
                </span>
                <span class="app-brand-text demo menu-text fw-bold" style="font-size:1.3rem; color:#fff; letter-spacing:1px; text-transform: uppercase;">SIUPJA</span>
            </a>
        @endrole
    </div>
    <hr class="my-2">
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-2">
        @role('Administrator')
            <li class="menu-header small text-uppercase fw-bold text-secondary px-3 mb-1 mt-2" style="font-size:0.85rem; letter-spacing:0.5px;">Users Management</li>
            <li class="menu-item {{ request()->is('users') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="menu-link d-flex align-items-center gap-2">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div>Kelola Pengguna</div>
                </a>
            </li>
            <li><hr class="dropdown-divider my-2"></li>
            <li class="menu-header small text-uppercase fw-bold text-secondary px-3 mb-1 mt-2" style="font-size:0.85rem; letter-spacing:0.5px;">System Management</li>
            <li class="menu-item {{ request()->is('system/settings') ? 'active' : '' }}">
                <a href="{{ route('system.settings') }}" class="menu-link d-flex align-items-center gap-2">
                    <i class="menu-icon tf-icons bx bx-cog"></i>
                    <div>Pengaturan Sistem</div>
                </a>
            </li>
            <li><hr class="dropdown-divider my-2"></li>
            <li class="menu-header small text-uppercase fw-bold text-secondary px-3 mb-1 mt-2" style="font-size:0.85rem; letter-spacing:0.5px;">Admin Panel</li>
            <li class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="menu-link d-flex align-items-center gap-2">
                    <i class="menu-icon tf-icons bx bx-bar-chart"></i>
                    <div>Dashboard</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('admin/tools*') ? 'active' : '' }}">
                <a href="{{ route('admin.tools.index') }}" class="menu-link d-flex align-items-center gap-2">
                    <i class="menu-icon tf-icons bx bx-cube"></i>
                    <div>Kelola Alat & Bahan</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('admin/loans*') ? 'active' : '' }}">
                <a href="{{ route('admin.loans.index') }}" class="menu-link d-flex align-items-center gap-2">
                    <i class="menu-icon tf-icons bx bx-check-circle"></i>
                    <div>Verifikasi Peminjaman</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('admin/returns*') ? 'active' : '' }}">
                <a href="{{ route('admin.returns.index') }}" class="menu-link d-flex align-items-center gap-2">
                    <i class="menu-icon tf-icons bx bx-check-shield"></i>
                    <div>Verifikasi Pengembalian</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('admin/reports*') ? 'active' : '' }}">
                <a href="{{ route('admin.reports.index') }}" class="menu-link d-flex align-items-center gap-2">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div>Laporan</div>
                </a>
            </li>
        @endrole
        @role('Member')
            <li class="menu-header small text-uppercase fw-bold text-secondary px-3 mb-1 mt-2" style="font-size:0.85rem; letter-spacing:0.5px;">Member Panel</li>
            <li class="menu-item {{ request()->is('member/dashboard') ? 'active' : '' }}">
                <a href="{{ route('member.dashboard') }}" class="menu-link d-flex align-items-center gap-2">
                    <i class="menu-icon tf-icons bx bx-home"></i>
                    <div>Dashboard</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('member/tools') ? 'active' : '' }}">
                <a href="{{ route('member.tools.index') }}" class="menu-link d-flex align-items-center gap-2">
                    <i class="menu-icon tf-icons bx bx-cube"></i>
                    <div>Daftar Alat</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('member/loans/create') ? 'active' : '' }}">
                <a href="{{ route('member.loans.create') }}" class="menu-link d-flex align-items-center gap-2">
                    <i class="menu-icon tf-icons bx bx-plus-circle"></i>
                    <div>Ajukan Peminjaman</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('member/loans') ? 'active' : '' }}">
                <a href="{{ route('member.loans.index') }}" class="menu-link d-flex align-items-center gap-2">
                    <i class="menu-icon tf-icons bx bx-history"></i>
                    <div>Riwayat Peminjaman</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('member/returns/create') ? 'active' : '' }}">
                <a href="{{ route('member.returns.create') }}" class="menu-link d-flex align-items-center gap-2">
                    <i class="menu-icon tf-icons bx bx-upload"></i>
                    <div>Ajukan Pengembalian</div>
                </a>
            </li>
        @endrole
    </ul>
    <style>
        .menu-item .menu-link {
            transition: background 0.2s, color 0.2s;
            border-radius: 0.5rem;
            padding: 0.65rem 1.1rem;
        }
        .menu-item.active > .menu-link {
            background: #e3f0ff;
            color: #2575fc;
            font-weight: bold;
        }
        .menu-item .menu-link:hover {
            background: #f2f6fc;
            color: #2575fc;
        }
        .menu-header {
            margin-top: 1.2rem;
            margin-bottom: 0.3rem;
        }
    </style>
</aside>
