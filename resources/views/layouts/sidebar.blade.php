<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="/" class="app-brand-link">
      <span class="app-brand-logo demo">
        <!-- SVG logo here -->
        <span style="display: flex; justify-content: center; align-items: center; padding: 10px;">
          <img 
            src="{{ asset('asset/img/favicon/logos.png') }}" 
            style="width: 200px; max-width: 150%; height: auto; object-fit: contain;" 
            alt="SMKI Logo" 
          />
        </span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">  

    {{-- @if(auth()->user()->role === 'admin')
    <!-- Dashboard -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>
    <li class="menu-item {{ Request::is('/admin/dashboard') ? 'active' : '' }}">
      <a href="/" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>  --}}

    {{-- @if(auth()->user()->role === 'admin') --}}
    @if(Auth::check() && Auth::user()->role == 'admin')

    <!-- Dashboard -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>
    <li class="menu-item {{ Request::is('/admin/dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>

    <!-- Layouts -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Tabel</span></li>
    <li class="menu-item {{ Request::is('tokos*') ? 'active' : '' }}">
      <a href="/tokos" class="menu-link">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Toko">Data Toko</div>
      </a>
    </li>
    <li class="menu-item {{ Request::is('kategori_produks*') ? 'active' : '' }}">
      <a href="/kategori_produks" class="menu-link">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Kategori Produk">Data Kategori Produk</div>
      </a>
    </li>
    <li class="menu-item {{ Request::is('produks*') ? 'active' : '' }}">
      <a href="/produks" class="menu-link">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Produk">Data Produk</div>
      </a>
    </li>
    <li class="menu-item {{ Request::is('pesanans*') ? 'active' : '' }}">
      <a href="/pesanans" class="menu-link">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Pesanan">Data Pesanan</div>
      </a>
    </li>
    {{-- <li class="menu-item {{ Request::is('transaksi/index*') ? 'active' : '' }}"> --}}
      {{-- <li class="menu-item {{ Request::is('transaksi') || Request::is('transaksi/*') ? 'active' : '' }}">
      <a href="{{ route('transaksi.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Transaksi">Data Transaksi</div>
      </a>
    </li> --}}


     <!-- Tambah Poin -->
     <li class="menu-item {{ Request::is('admin/tambah_poin*') ? 'active' : '' }}">
      <a href="{{ route('admin.showTambahPoinForm') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
        <div data-i18n="Tambah Poin">Manajemen Saldo</div>
      </a>
    </li>
    @endif


    {{-- @if(auth()->user()->role === 'pelanggan') --}}
    @if(Auth::check() && Auth::user()->role == 'pelanggan')

    <!-- Dashboard -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>
    <li class="menu-item {{ Request::is('/pelanggan/dashboard') ? 'active' : '' }}">
      <a href="{{ route('pelanggan.dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li> 

    {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>
    <li class="menu-item {{ Request::is('/admin/dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li> --}}

    <li class="menu-header small text-uppercase"><span class="menu-header-text">Tabel</span></li>
    <li class="menu-item {{ Request::is('produks*') ? 'active' : '' }}">
      <a href="/produks" class="menu-link">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Produk">Data Produk</div>
      </a>
    </li>
    <li class="menu-item {{ Request::is('pesanans*') ? 'active' : '' }}">
      <a href="/pesanans" class="menu-link">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Pesanan">Data Pesanan</div>
      </a>
    </li>
    @endif
  </ul>
</aside>
