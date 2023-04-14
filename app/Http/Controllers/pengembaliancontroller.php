<?php

namespace App\Http\Controllers;
use App\pengembalian;
use App\peminjaman;
use App\buku;
use App\anggota;



use Illuminate\Http\Request;

class pengembaliancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalian = pengembalian::orderBy('created_at', 'DESC')->paginate(10);

        return view('pengembalian.index', compact('pengembalian')); 
    }

    // public function prosespengembalian(Request $request, $id) {
    //     $peminjaman = peminjaman::find($id);
        // dd($peminjaman);
    //     $pengembalian = [
    //         'jumlah_buku_dikembalikan' => $peminjaman['jumlah_buku_dipinjam'],
    //         'peminjaman_id' => $id,
    //     ];

    //     // dd($pengembalian);
    //     pengembalian::create($pengembalian);
    //     peminjaman::where('id', $id)->delete();
        
    //     return redirect(route('pengembalian.index'))->with('success', 'Pengembalian berhasil ditambahkan');    
    // }

    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $anggota = anggota::all();
    $buku = buku::all();
    return view('pengembalian.create', compact( 'anggota', 'buku'));  
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal_pinjam'        => 'required',
            'tanggal_kembali'       => 'required',
            'jumlah_buku_dipinjam'  => 'required',
            'jumlah_buku_dikembalikan' => 'required',
            'anggota_id'            => 'required',
            'buku_id'               => 'required',
            
            
        ]);

        pengembalian::create([
            'tanggal_pinjam'          => $request->tanggal_pinjam,
            'tanggal_kembali'         => $request->tanggal_kembali,
            'jumlah_buku_dipinjam'    => $request->jumlah_buku_dipinjam,
            'jumlah_buku_dikembalikan' => $request->jumlah_buku_dikembalikan,
            'anggota_id'              => $request->anggota_id,
            'buku_id'                 => $request->buku_id,
           
        ]); 

        // $peminjaman = peminjaman::find($request->peminjaman_id);
        // $buku = buku::find($peminjaman->peminjaman_id);
       // dd($buku);
       $buku = buku::find($request->buku_id);
       $buku->stok_buku  - $request->jumlah_buku_dikembalikan ;
       $buku->update();


        // pengembalian::create($request->all());

        return redirect(route('pengembalian.index'))->with(['success' => 'Pengembalian Baru Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $peminjaman = peminjaman::findorFail($peminjaman_id);

        // return view('pengembalian.index', [
        //     'peminjaman_id' => $peminjaman_id,
        //     'semua_peminjaman' => peminjaman::all(),
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengembalian = pengembalian::where('id',$id)->first();
        $anggota = anggota::all();
        $buku = buku::all();
        return view('pengembalian.edit', compact('pengembalian', 'anggota', 'buku')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'tanggal_pinjam'        => 'required',
            'tanggal_kembali'       => 'required',
            'jumlah_buku_dipinjam'  => 'required',
            'jumlah_buku_dikembalikan' => 'required',
            'anggota_id'            => 'required',
            'buku_id'               => 'required',
            
            
        ]);

        $pengembalian= pengembalian::find($id);
        $pengembalian->update([
            'tanggal_pinjam'          => $request->tanggal_pinjam,
            'tanggal_kembali'         => $request->tanggal_kembali,
            'jumlah_buku_dipinjam'    => $request->jumlah_buku_dipinjam,
            'jumlah_buku_dikembalikan' => $request->jumlah_buku_dikembalikan,
            'anggota_id'              => $request->anggota_id,
            'buku_id'                 => $request->buku_id,
            
        ]); 

        // $pengembalian->update($request->all());

        $buku = Buku::find($request->buku_id);
        $buku->stok_buku += $request->jumlah_buku_dikembalikan;
        $buku->update();
        


    return redirect(route('pengembalian.index'))->with(['success' => 'Pengembalian Diperbaharui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pengembalian::where('id', $id)->delete();
        return redirect(route('pengembalian.index'))->with(['success' => 'Pengembalian Dihapus!']);
    }
}
