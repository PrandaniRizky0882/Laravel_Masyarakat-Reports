<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item">
      <a href="{{ route('petugas.dashboard') }}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item has-treeview">
      <a href="{{ route('petugas.tampil') }}" class="nav-link">
        <i class="nav-icon fas fa-folder-open"></i>
        <p>
          Laporan Pengaduan
        </p>
      </a>
    </li>
    <li class="nav-item has-treeview">
      <a href="{{ route('petugas.tanggapan') }}" class="nav-link">
        <i class="nav-icon fa fa-cog fa-spin fa-3x fa-fw"></i>
        <p>
          Tanggapan
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('logout')}}" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
          Log out
        </p>
      </a>
    </li>
  </ul>
</nav>