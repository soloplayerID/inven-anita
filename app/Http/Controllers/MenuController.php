<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Restock;
use Illuminate\Http\Request;
use App\Exports\MenuExport;
use Maatwebsite\Excel\Facades\Excel;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();
        $kategori = Kategori::all();
        return view('pages.manager.menu.index',compact('menu','kategori'));
    }

    public function export()
    {
        $nama_file = 'laporan_stock_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new MenuExport, $nama_file);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->gambar == null) {
            $menu = new Menu;
            $menu->name = $request->name;
            $menu->kategori_id = $request->kategori;
            $menu->deskripsi = $request->deskripsi;
            $menu->stock = $request->stock;
            $menu->stok_awal = $request->stok_awal;
            $menu->satuan = $request->satuan;
            $menu->harga = $request->harga;
            $menu->harga_beli = $request->harga_beli;
            $menu->save();
        }else{
            $gambar = $request->file('gambar');

            $nama_foto = time() . "_" . $gambar->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $moved = 'fotoMenu';
            $gambar->move($moved, $nama_foto);

            $menu = new Menu;
            $menu->name = $request->name;
            $menu->kategori_id = $request->kategori;
            $menu->deskripsi = $request->deskripsi;
            $menu->stock = $request->stock;
            $menu->stok_awal = $request->stok_awal;
            $menu->satuan = $request->satuan;
            $menu->harga = $request->harga;
            $menu->harga_beli = $request->harga_beli;
            $menu->gambar = $nama_foto;
            $menu->save();
        }
        Activity()->log('Tambah Product '.$menu->name);
        return back()->with('success','Menu Berhasil Di Tambah');

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
        //
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
        $menu = Menu::findOrFail($id);
        if ($request->has('gambar')) {
            $menu->name = $request->name;
            $menu->kategori_id = $request->kategori;
            $menu->deskripsi = $request->deskripsi;
            $menu->stock = $request->stock;
            $menu->stok_awal = $request->stok_awal;
            $menu->satuan = $request->satuan;
            $menu->harga = $request->harga;
            $menu->harga_beli = $request->harga_beli;
            if(isset($menu->gambar)){
                unlink("fotoMenu/" . $menu->gambar);
                $file = $request->file('gambar');
                $gambar_item_path = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'fotoMenu';
                $file->move($tujuan_upload,$gambar_item_path);
                $menu->gambar=$gambar_item_path;
            }else{
                $file = $request->file('gambar');
                $gambar_item_path = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'fotoMenu';
                $file->move($tujuan_upload,$gambar_item_path);
                $menu->gambar = $gambar_item_path;
            }$menu->save();
        } else {
            
            $menu->name = $request->name;
            $menu->kategori_id = $request->kategori;
            $menu->deskripsi = $request->deskripsi;
            $menu->stock = $request->stock;
            $menu->stok_awal = $request->stok_awal;
            $menu->satuan = $request->satuan;
            $menu->harga = $request->harga;
            $menu->harga_beli = $request->harga_beli;
            $menu->save();
        }
        Activity()->log('Update Menu '. $menu->name);
        return back()->with('success','Menu Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $restock = Restock::where('menu_id',$menu->id)->get();
        // dd($restock);
        if ($restock == null) {
            if ($menu->gambar == null) {
                $menu->delete();
            } else {
                unlink("fotoMenu/" . $menu->gambar);
                $menu->delete();
            }
        } else {
            if ($menu->gambar == null) {
                foreach ($restock as $item) {
                    $item->delete();
                }
                $menu->delete();
            } else {
                foreach ($restock as $item) {
                    $item->delete();
                }
                unlink("fotoMenu/" . $menu->gambar);
                $menu->delete();
            }
        }
        Activity()->log('Menghapus Product');
        return back()->with('success','Menu Berhasil Di Hapus');

    }
}
