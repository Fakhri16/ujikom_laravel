<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Presensi Siswa</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"  rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        {{-- chart cdn --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    {{-- link icon  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
{{-- <style>
    .sidebar {
    background-color:#5F9EA0;
} --}}
{{-- </style> --}}
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        {{-- <ul class="navbar-nav bg-success bg-opacity-25 sidebar sidebar-dark accordion sidebar sidebar-dark accordion" id="accordionSidebar" > --}}
            <ul class="navbar-nav bg-opacity-25 sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #2E8B57;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="bi bi-calendar2-week"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Presensi Siswa</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Halaman</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-folder-check"></i>
                    <span>Presensi</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">presensi </h6>
                        <a class="collapse-item" href="{{route('absensi.index')}}"> Presensi</a>
                        <a class="collapse-item" href="{{route('absensi')}}">Tambah Presensi</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data 
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="bi bi-database-add"></i>
                    <span>Kelas</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Tersedia:</h6>
                        <a class="collapse-item" href="{{route('createkelas')}}">Tambah Data Kelas</a>
                        <a class="collapse-item" href="{{route('kelas')}}">Data Kelas</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="bi bi-database-fill-check"></i>
                    <span>Siswa</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Tersedia:</h6>
                        <a class="collapse-item" href="{{route('createsiswa')}}">Create Siswa</a>
                        <a class="collapse-item" href="{{route('siswa')}}">Data Siswa</a>

                    </div>
                </div>
            </li>
            @if (Auth::user()->roles->contains('nama_role', 'admin'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesAdmin"
                    aria-expanded="true" aria-controls="collapsePagesAdmin">
                    <i class="bi bi-database-fill-check"></i>
                    <span>Mata Pelajaran</span>
                </a>
                <div id="collapsePagesAdmin" class="collapse" aria-labelledby="headingPagesAdmin" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Tersedia:</h6>
                        <a class="collapse-item" href="{{ route('createmapel') }}">Tambah Data Mapel</a>
                        <a class="collapse-item" href="{{ route('mapel') }}">Data Mapel</a>
                    </div>
                </div>
            </li>
            @endif
            
            @if (Auth::user()->roles->contains('nama_role', 'Bk'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesBk"
                    aria-expanded="true" aria-controls="collapsePagesBk">
                    <i class="bi bi-database-fill-check"></i>
                    <span>Mata Pelajaran</span>
                </a>
                <div id="collapsePagesBk" class="collapse" aria-labelledby="headingPagesBk" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Tersedia:</h6>
                        <a class="collapse-item" href="{{ route('tampilym') }}">Data Mapel</a>
                    </div>
                </div>
            </li>
            @endif
            
            @if (Auth::user()->roles->contains('nama_role', 'Walas'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesWalas"
                    aria-expanded="true" aria-controls="collapsePagesWalas">
                    <i class="bi bi-database-fill-check"></i>
                    <span>Mata Pelajaran</span>
                </a>
                <div id="collapsePagesWalas" class="collapse" aria-labelledby="headingPagesWalas" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Tersedia:</h6>
                        <a class="collapse-item" href="{{ route('tampilym') }}">Data Mapel</a>
                    </div>
                </div>
            </li>
            @endif
            
<!-- Nav Item - Pages Collapse Menu -->
@if (Auth::user()->roles->contains('nama_role', 'admin'))
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="bi bi-database-fill-check"></i>
            <span>Jurusan</span>
        </a>
        <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Tersedia:</h6>
                <a class="collapse-item" href="{{route('createjurusan')}}">Tambah Data Jurusan</a>
                <a class="collapse-item" href="{{route('jurusan')}}">Data jurusan</a>
            </div>
        </div>
    </li>
@elseif (Auth::user()->roles->contains('nama_role', 'Guru'))
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="bi bi-database-fill-check"></i>
            <span>Jurusan</span>
        </a>
        <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Tersedia:</h6>
                <a class="collapse-item" href="{{route('tampilj')}}">Data jurusan</a>
            </div>
        </div>
    </li>
@elseif (Auth::user()->roles->contains('nama_role', 'Bk'))
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="bi bi-database-fill-check"></i>
            <span>Jurusan</span>
        </a>
        <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Tersedia:</h6>
                <a class="collapse-item" href="{{route('tampilj')}}">Data jurusan</a>
            </div>
        </div>
    </li>
@elseif (Auth::user()->roles->contains('nama_role', 'Walas'))
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="bi bi-database-fill-check"></i>
            <span>Jurusan</span>
        </a>
        <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Tersedia:</h6>
                <a class="collapse-item" href="{{route('tampilj')}}">Data jurusan</a>
            </div>
        </div>
    </li>
@endif

           <!-- Nav Item - Pages Collapse Menu -->
@if (Auth::user()->roles->contains('nama_role', 'admin'))
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="bi bi-database-fill-check"></i>
        <span>Data Guru</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Tersedia:</h6>
            <a class="collapse-item" href="{{route('createguru')}}">Tambah Data Guru</a>
            <a class="collapse-item" href="{{route('guru')}}">Data Guru</a>
        </div>
    </div>
</li>
@endif
      <!-- Nav Item - Pages Collapse Menu -->
@if (Auth::user()->roles->contains('nama_role', 'Guru'))
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="bi bi-database-fill-check"></i>
        <span>Data Guru</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Tersedia:</h6>
            <a class="collapse-item" href="{{route('createguru')}}">Tambah Data Guru</a>
            <a class="collapse-item" href="{{route('guru')}}">Data Guru</a>
        </div>
    </div>
</li>
@elseif (Auth::user()->roles->contains('nama_role', 'Walas') || Auth::user()->roles->contains('nama_role', 'Bk') || Auth::user()->roles->contains('nama_role', 'Walas'))
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="bi bi-database-fill-check"></i>
        <span>Data Guru</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Tersedia:</h6>
            <a class="collapse-item" href="{{route('tampilg')}}">Data Guru</a>
        </div>
    </div>
</li>
@endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       
                      

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('img/undraw_profile.svg')}}">
                            </a>
                         <!-- Dropdown - User Information -->
<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
    @if(Auth::user()->roles->contains('nama_role', 'admin'))
        <a class="dropdown-item" href="{{ route('register') }}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Daftar Account
        </a>
        <a class="dropdown-item" href="{{route('register.index')}}">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Akun 
        </a>
        <a class="dropdown-item" href="{{route('role')}}">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            Tambah Role
        </a>
        <a class="dropdown-item" href="{{route('roley')}}">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            Tampil Role
        </a>
    @endif
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
    </a>
</div>

                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    {{-- isi field kosong  --}}
                    @yield('dataawal')
                    {{-- mapel --}}
                    @yield('createmapel')
                    @yield('tampilmapel')
                    @yield('updatemapel')
                    @yield('tampilmapel2')

                    {{-- jurusan --}}
                    @yield('createjurusan')
                    @yield('updatejurusan')
                    @yield('tampiljurusan')
                    @yield('tampiljurusan2')

                    {{-- guru --}}
                    @yield('createguru')
                    @yield('tampilguru')
                    @yield('updateguru')
                    @yield('tampilguru2')

                    {{-- kelas --}}
                    @yield('createkelas')
                    @yield('tampilkelas')
                    @yield('updatekelas')

                    {{-- siswa --}}
                    @yield('createsiswa')
                    @yield('tampilsiswa')
                    @yield('updatesiswa')

                    {{-- absensi --}}
                    @yield('createabsensisiswa')
                    @yield('tampilabsensi')
                    @yield('updateabsensi')
                    @yield('date')

                    {{-- register --}}
                    @yield('creatregister')
                    @yield('indexregister')
                    @yield('updateregister')

                    {{-- role --}}
                    @yield('roleindex')
                    @yield('rolecreate')
                    @yield('updaterole')
                    {{-- chart --}}
                    @yield('datachart')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan Tombol "logout" jika ingin keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logut">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script>
        $(function(){
  $('#datepicker').datepicker();
});
    </script>
    <script src="{{asset ('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset ('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset ('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scrip9ts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if ($message= Session::get('success')) 
            <script>
                const message =" {{session('success')}}";
                Swal.fire({
                title: "Data Sudah Disimpan",
                text: 'Data Tersimpan',
                icon: "success"
});
            </script>
        
   @endif
   @if ($message= Session::get('success2')) 
   <script>
       const message =" {{session('success')}}";
       Swal.fire({
       title: "Data Sudah Diperbarui",
       text: 'Data Tersimpan',
       icon: "success"
});
   </script>

@endif

   @if ($message= Session::get('update')) 
            <script>
                const message =" {{session('update')}}";
                Swal.fire({
                title: "Data Berhasil di update!",
                text: 'Update tersimpan',
                icon: "success"
});
            </script>
        
   @endif
   @if ($message= Session::get('delete')) 
   <script>
       const message =" {{session('delete')}}";
       Swal.fire({
       title: "Data Berhasil di delete!",
       text: 'Data Sudah di Hapus',
       icon: "success"
});
   </script>

@endif
@if ($message= Session::get('gagal')) 
<script>
    const message =" {{session('gagal')}}";
    Swal.fire({
    title: "Data Sudah Disimpan",
    text: 'Data Tersimpan',
    icon: "warning"
});
</script>

@endif
@if ($message= Session::get('login')) 
<script>
    const message =" {{session('login')}}";
    Swal.fire({
    title: "Login Berhasil",
    icon: "success"
});
</script>

@endif
@if ($message= Session::get('delete2')) 
<script>
    const message =" {{session('delete')}}";
    Swal.fire({
    title: "Data sudah ada hari ini!",
    text: 'Data Sudah ada',
    icon: "error"
});
</script>

@endif
</body>


</html>