@extends('admin_template')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Kategori</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="container mt-3 mb-3">
                                    <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="form-group">
                                            <label for="kategori_buku">Kategori</label>
                                            <input type="text" name="kategori_buku" class="form-control"
                                                value="{{ $kategori->kategori_buku }}" required>
                                            <p class="text-danger">{{ $errors->first('kategori_buku') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi Kategori</label>
                                            <textarea name="deskripsi" class="form-control" required>{{ $kategori->deskripsi }}</textarea>
                                            <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm">Ubah</button>
                                            <a class="btn btn-danger btn-sm" href="{{ route('kategori.index') }}">Batal</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
