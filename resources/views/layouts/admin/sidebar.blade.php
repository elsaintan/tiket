<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/tickets*') ? 'active' : '' }}" aria-current="page"
                    href="/dashboard/tickets">
                    <span data-feather="home"></span>
                    Pemesanan Tiket
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/checkIn') ? 'active' : '' }}" href="/dashboard/checkIn">
                    <span data-feather="file-text"></span>
                    Check In
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/laporan') ? 'active' : '' }}" href="/dashboard/laporan">
                    <span data-feather="file-text"></span>
                    Laporan
                </a>
            </li>
        </ul>
    </div>
</nav>
