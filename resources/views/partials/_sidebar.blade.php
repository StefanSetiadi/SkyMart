<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{route('home')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Transaksi</span>
      </a>
    </li>
@if (Auth::user()->role === 'admin')
  <li class="nav-item">
    <a class="nav-link" href="{{route('riwayat_transaksi')}}">
      <i class="icon-layout menu-icon"></i>
      <span class="menu-title">Riwayat Transaksi</span>
    </a>
  </li>
@endif
    
    <li class="nav-item">
      <a class="nav-link" href="{{route('barang')}}">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Barang</span>
      </a>
    </li>
@if (Auth::user()->role === 'admin')
    <li class="nav-item">
      <a class="nav-link" href="{{route('datakaryawan')}}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Daftar Karyawan</span>
      </a>
    </li>
@endif
    <li class="nav-item">
      <a class="nav-link" href="{{route('tentang')}}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Tentang</span>
      </a>
    </li>
  </ul>
</nav>