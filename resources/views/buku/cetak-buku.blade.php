<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CETAK DATA BUKU</title>
        <style>
            table.static {
                position: relative;
                border: 1px solid #543535;
            }
        </style>
    </head>
    <body>
        <div class="form-group">
            <p align="center"><b>CETAK DATA BUKU</b></p>
            <p align="center"><b>Silahkan Tekan CTRL+P Untuk Mencetak</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Isbn_Issn</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">Tempat Terbit</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Rak</th>
                    <th scope="col">Deskripsi</th>
                </tr>
        @foreach ($dtbuku as $item)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td><img width="150px" src="{{ url('/data_file/' . $item->cover) }}"></td>
          <td>{{ $item->isbn_issn }}</td>
          <td>{{ $item->judul_buku }}</td>
          <td>{{ $item->penulis->nama_penulis }}</td>
          <td>{{ $item->penerbit->nama_penerbit }}</td>
          <td>{{ $item->tahun_terbit }}</td>
          <td>{{ $item->tempat_terbit }}</td> 
          <td>{{ $item->kategori->kategori_buku }}</td>
          <td>{{ $item->stok_buku }}</td>
          <td>{{ $item->rak->lokasi_rak }}</td>
          <td>{{ $item->deskripsi }}</td>
        </tr>
        @endforeach
        </table>
        </div>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</html>