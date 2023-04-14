<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <title>@yield('title')Perpus | Digital</title> -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('/bower_components/admin-lte/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts.header')
  @include('layouts.navbar')


  <!-- Main Sidebar Container -->
  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          {{-- <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col --> --}}
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col --> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Pengembalian</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('pengembalian.create') }}" class="btn btn-info m-2">Tambah Data Pengembalian</a>
                                <div class="row">
                                    <table class="table table-bordered table-hover table-striped" id="table-data">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Nama Anggota</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Dipinjam</th>
                                            <th>Dikembalikan</th>
                                            <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengembalian as $i => $v)
                                                <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $v->anggota->nama}}</td>
                                                <td>{{ $v->buku->judul_buku}}</td>
                                                <td>{{ $v->tanggal_pinjam }}</td>
                                                <td>{{ $v->tanggal_kembali }}</td>
                                                <td>{{ $v->jumlah_buku_dipinjam }}</td>
                                                <td>{{ $v->jumlah_buku_dikembalikan}}</td>
                                                <td>
                                                        <form action="{{ route('pengembalian.destroy', $v->id) }}"
                                                            method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="{{ route('pengembalian.edit', $v->id) }}"
                                                            class="btn btn-primary btn-sm">Edit</a>
                                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                                        </form>
                                                </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
        <!-- @yield('content') -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('layouts.script')

</body>
</html>
