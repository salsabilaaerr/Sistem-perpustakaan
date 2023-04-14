<?php

namespace App\Http\Controllers;
use App\kategori;

use Illuminate\Http\Request;

class kategoricontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $kategori = kategori::orderBy('created_at', 'DESC')->where('kategori_buku', 'LIKE', '%' .$request->search. '%')->paginate(10);
        }else{
            $kategori =kategori::orderBy('created_at', 'DESC')->paginate(10);

        }

        return view('kategori.index', compact('kategori')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("kategori.create"); 
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
            'kategori_buku'          => 'required|string|max:150|unique:kategori',
            'deskripsi'              =>  'required',
        ]);


        kategori::create([    
            'kategori_buku'             => $request->kategori_buku,
            'deskripsi'                 => $request->deskripsi,
            ]);

            return redirect(route('kategori.index'))->with(['success' => 'Kategori Baru Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
        
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
            'kategori_buku'              => 'required',
            'deskripsi'                  => 'required',
        ]);


         $kategori= kategori::find($id);
         $kategori->update([
            'kategori_buku'             => $request->kategori_buku,
            'deskripsi'                 => $request->deskripsi,
        ]);

    return redirect(route('kategori.index'))->with(['success' => 'Kategori Diperbaharui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kategori::where('id', $id)->delete();
        return redirect(route('kategori.index'))->with(['success' => 'Kategori Dihapus!']); 
    }
}
