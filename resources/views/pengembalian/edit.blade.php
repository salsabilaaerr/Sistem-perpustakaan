@extends('admin_template')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Pengembalian</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="{{ route('pengembalian.update', $pengembalian->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group">
                                        <label for="anggota_id">Nama Anggota</label>
                                        <select class="form-control" name="anggota_id">
                                            <option value="">Pilih Anggota</option>
                                            @foreach ($anggota as $k)
                                                <option value="{{ $k->id }}"
                                                    @if ($pengembalian->anggota_id == $k->id) selected @endif>
                                                    {{ $k->nama }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('anggota_id') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="buku_id">Judul Buku</label>
                                        <select class="form-control" name="buku_id">
                                            <option value="">Pilih Judul Buku</option>
                                            @foreach ($buku as $k)
                                                <option value="{{ $k->id }}"
                                                    @if ($pengembalian->buku_id == $k->id) selected @endif>
                                                    {{ $k->judul_buku}}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('buku_id') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                        <input type="date" name="tanggal_pinjam" class="form-control"
                                            value="{{ $pengembalian->tanggal_pinjam }}" required>
                                        <p class="text-danger">{{ $errors->first('tanggal_pinjam') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_kembali">Tanggal Kembali</label>
                                        <input type="date" name="tanggal_kembali" class="form-control"
                                            value="{{ $pengembalian->tanggal_kembali }}" required>
                                        <p class="text-danger">{{ $errors->first('tanggal_kembali') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_buku_dipinjam">Jumlah Buku Dipinjam</label>
                                        <input type="number" name="jumlah_buku_dipinjam" class="form-control"
                                            value="{{ $pengembalian->jumlah_buku_dipinjam }}" required>
                                        <p class="text-danger">{{ $errors->first('jumlah_buku_dipinjam') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_buku_dikembalikan">Jumlah Buku Dikembalikan</label>
                                        <input type="number" name="jumlah_buku_dikembalikan" class="form-control"
                                        value="{{ $pengembalian->jumlah_buku_dikembalikan }}" required>
                                        <p class="text-danger">{{ $errors->first('jumlah_buku_dikembalikan') }}</p>
                                    </div>
                                    <button class="btn btn-primary btn-sm">Ubah</button>
                                    <a class="btn btn-danger btn-sm" href="{{ route('pengembalian.index')}}" >Batal</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
