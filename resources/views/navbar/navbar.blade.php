<!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
          <img src="{{asset('img/logo/logo-cwf2.png')}}">
        </div>
        <div class="sidebar-brand-text mx-3"> {{ $title }} </div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item {{ ($active === 'dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      @can('admin_staff')
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Supplier
      </div>
      <!-- Supplier -->
      <!-- menggunakan class directive -->
      <li class="nav-item {{ Request::is('supplier') ? 'active' : '' }}">
        <a class="nav-link" href="/supplier">
          <i class="fas fa-fw fas fa-truck"></i>
          <span>Supplier</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      @endcan
      @can('admin_tirza')
      <div class="sidebar-heading">
        Product
      </div>
      <!-- Supplier -->
      <!-- menggunakan class directive -->
      <li class="nav-item {{ Request::is('product') ? 'active' : '' }}">
        <a class="nav-link" href="/product">
          <i class="fas fa-fw fas fa-fish"></i>
          <span>Product</span>
        </a>
      </li>
      <!-- SmartPhone -->
      @endcan
      @can('admin_staff_security')
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Smartphone
      </div>
      <li class="nav-item {{ ($active === 'smartphone') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSmartphone" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fa fa-mobile"></i>
          <span>Smartphone</span>
        </a>
        <div id="collapseSmartphone" class="collapse {{ ($active === 'smartphone') ? 'show' : '' }}" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            @can('admin_staff')
            <a class="collapse-item {{ Request::is('smartphone-create*') ? 'active' : '' }}" href="/smartphone-create">Data Smartphone</a>
            @endcan
            <a class="collapse-item {{ Request::is('stored') ? 'active' : '' }}" href="/stored">Stored</a>
          </div>
        </div>
      </li>
      <!-- sidebar -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Visitor
      </div>
      <li class="nav-item {{ ($active === 'visitor') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span class="testerlah">Visitor</span>
        </a>
        <div id="collapseTable" class="collapse {{ ($active === 'visitor') ? 'show' : '' }}" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('visitors/create') ? 'active' : '' }}" href="/visitors/create">Input Data Visitor</a>
            <a class="collapse-item {{ Request::is('visitors') ? 'active' : '' }}" href="/visitors">Masuk</a>
            <a class="collapse-item {{ Request::is('dataVisitor') ? 'active' : '' }}" href="/dataVisitor">Data</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Mutasi Barang
      </div>
      <li class="nav-item {{ ($active === 'mutasi') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMasuk" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa fa-book"></i>
          <span>Mutasi</span>
        </a>
        <div id="collapseMasuk" class="collapse {{ ($active === 'mutasi') ? 'show' : '' }}" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('mutasi/create*') ? 'active' : '' }}" href="/mutasi/create">Input Data Mutasi</a>
            <a class="collapse-item {{ Request::is('mutasi') ? 'active' : '' }}" href="/mutasi">Masuk</a>
            <a class="collapse-item {{ Request::is('mutasiKeluar') ? 'active' : '' }}" href="/mutasiKeluar">Keluar</a> 
            <a class="collapse-item {{ Request::is('allMutasi') ? 'active' : '' }}" href="/allMutasi">Data Mutasi</a> 
          </div>
        </div>
      </li>
      <!-- Data Kontainer -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Kontainer
      </div>
      <li class="nav-item {{ ($active === 'container') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKontainer" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-truck"></i>
          <span>Kontainer</span>
        </a>
        <div id="collapseKontainer" class="collapse {{ ($active === 'container') ? 'show' : '' }}" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('kontainer/create*') ? 'active' : '' }}" href="/kontainer/create">Input Data Kontainer</a>
            <a class="collapse-item {{ Request::is('kontainer') ? 'active' : '' }}" href="/kontainer">Masuk</a>
          </div>
        </div>
      </li>
      <!-- Izin Karyawan -->
      @endcan
      <!-- Barang Keluar -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Barang Keluar Product
      </div>
      <li class="nav-item {{ ($active === 'brgKeluar') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBarang" aria-expanded="true"
        aria-controls="collapseTable">
        <i class="fas fa-fw fa fa-box"></i>
        <span>Product Keluar</span>
      </a>
      <div id="collapseBarang" class="collapse {{ ($active === 'brgKeluar') ? 'show' : '' }}" aria-labelledby="headingTable" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            @can('admin_tirza_produksi_agusnaini')
            <a class="collapse-item {{ Request::is('brgKeluar/create*') ? 'active' : '' }}" href="/brgKeluar/create">Input Product Keluar</a>
            @endcan
            <a class="collapse-item {{ Request::is('/notaBarang*') ? 'active' : '' }}" href="/notaBarang">Data</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      @can('produksi')
      <div class="sidebar-heading">
       Izin Karyawan
      </div>
      <li class="nav-item {{ Request::is('permission*') ? 'active' : '' }}">
        <a class="nav-link" href="/permission">
          <i class="fas fa-fw a fa-file"></i>
          <span>Input Izin Karyawan </span>
        </a>
      </li>
      @endcan
      <!-- surat dan dokumen -->
      @can('admin_staff_security')
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Dokumen masuk
      </div>
      <li class="nav-item {{ Request::is('dokumen*') ? 'active' : '' }}">
        <a class="nav-link" href="/dokumen">
          <i class="fas fa-fw a fa-file"></i>
          <span>Input Dokumen </span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Kendaraan
      </div>
      <li class="nav-item {{ Request::is('kendaraan*') ? 'active' : '' }}">
        <a class="nav-link" href="/kendaraan">
          <i class="fas fa-fw fa fa-car"></i>
          <span>Transportasi </span>
        </a>
      </li>
  @endcan
      <!-- Users -->
      @can('is_admin')
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Users
      </div>
      <li class="nav-item {{ ($active === 'users') ? 'active' : '' }}">
        <a class="nav-link" href="/users">
          <i class="fas fa-fw fa fa-user"></i>
          <span>User</span>
        </a>
      </li>
      @endcan
      <!-- Message -->
      @can('admin_staff')
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Message
      </div>
      <li class="nav-item {{ ($active === 'message') ? 'active' : '' }}">
        <a class="nav-link" href="/message-index">
          <i class="fas fa-fw fa fa fa-envelope"></i>
          <span>Message</span>
        </a>
      </li>
      @endcan
      <!-- <div class="version" id="version-ruangadmin"></div> -->
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <livewire:navbar></livewire:navbar>
        

