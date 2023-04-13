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
    public function index(Request $request)
    {
        // $ice = IceCreamModel::all();
        // return view('iceCream.ice_cream')
        //     ->with('ice', $ice);

        if($request->get('query') !== null){
            $query = $request->get('query');
            $ice = IceCreamModel::where('kode_barang', 'LIKE', '%'.$query.'%')
                ->orWhere('nama_ice', 'LIKE', '%'.$query.'%')
                ->orWhere('harga', 'LIKE', '%'.$query.'%')
                ->orWhere('qty', 'LIKE', '%'.$query.'%')
                ->paginate(5);
        } else {
            $ice = IceCreamModel::paginate(5);
        }
        return view('iceCream.ice_cream', ['ice' => $ice]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('iceCream.create_iceCream')
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
        $request->validate([
            'kode_barang' => 'required|string|max:10|unique:ice_cream,kode_barang',
            'nama_ice' => 'required|string|max:50',
            'harga' => 'required',
            'qty' => 'required|integer',
        ]);

        $data = IceCreamModel::create($request->except(['_token']));

        //jika berhasil
        return redirect('ice_cream')
                ->with('success', 'Ice Cream Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ice_cream  $ice
     * @return \Illuminate\Http\Response
     */
    public function show(IceCreamModel $ice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ice_cream  $ice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ice = IceCreamModel::find($id);
        return view('iceCream.create_iceCream')
                    ->with('ice',$ice)
                    ->with('url_form',url('/ice_cream/'.$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ice_cream  $ice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request ->validate([
                'kode_barang' => 'required|string|max:10|unique:ice_cream,kode_barang,'.$id,
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
     * @param  \App\Models\ice_cream  $ice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        IceCreamModel::where('id', '=', $id)->delete();
        return redirect('ice_cream')
        ->with ('success', 'Ice Cream Berhasil Dihapus');
    }
}
