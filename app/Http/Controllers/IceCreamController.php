<?php

namespace App\Http\Controllers;

use App\Models\IceCream;
use App\Models\IceCreamModel;
use Illuminate\Http\Request;

class IceCreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ice = IceCreamModel::all();
        return view('iceCream.ice_cream')
            ->with('ice', $ice);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('iceCream.create_iceCream')
            ->with('url_form',url('/ice_cream'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Melakukan validasi data
        $request->validate([
            'kode_barang' => 'required|string|max:10|unique:ice_cream,kode_barang',
            'nama_ice' => 'required|string|max:50',
            'harga' => 'required',
            'qty' => 'required|integer',
        ]);

        // Membuat data baru dalam database
        $data = new IceCreamModel();
        $data->kode_barang = $request->input('kode_barang');
        $data->nama_ice = $request->input('nama_ice');
        $data->harga = $request->input('harga');
        $data->qty = $request->input('qty');
        $data->save();

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('/ice_cream')
        ->with('success', 'Ice Cream Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IceCream  $iceCream
     * @return \Illuminate\Http\Response
     */
    public function show(IceCreamModel $iceCream)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IceCream  $iceCream
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ice_cream = IceCreamModel::find($id);
        return view('iceCream.create_iceCream')
            ->with('ice',$ice_cream)
            ->with('url_form',url('/ice_cream/'.$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IceCream  $iceCream
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //Melakukan validasi data
        $request->validate([
            'kode_barang' => 'required|string|max:10|unique:ice_cream,kode_barang,',
            'nama_ice' => 'required|string|max:50',
            'harga' => 'required',
            'qty' => 'required|integer',
        ]);

        $data = IceCreamModel::where('id', '=', $id)->update($request->except(['_token','_method']));
        return redirect('ice_cream')
            ->with('success','Ice Cream Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IceCream  $iceCream
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        IceCreamModel::where('id', '=', $id)->delete();
        return redirect('ice_cream')
            ->with('success', 'Ice Cream Berhasil Dihapus');
    }
}
