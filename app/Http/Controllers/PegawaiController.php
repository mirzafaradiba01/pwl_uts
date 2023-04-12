<?php

namespace App\Http\Controllers;

use App\Models\IceCreamModel;
use App\Models\PegawaiModel;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pegawai = PegawaiModel::all();
        // return view('pegawai.pegawai')
        //     ->with('pegawai', $pegawai);

        if(\Illuminate\Support\Facades\Request::get('query') !== null){
            $query = \Illuminate\Support\Facades\Request::get('query');
            $pegawai = PegawaiModel::where('kode_pegawai', 'LIKE', '%'.$query.'%')
                ->orWhere('nama', 'LIKE', '%'.$query.'%')
                ->orWhere('jk', 'LIKE', '%'.$query.'%')
                ->orWhere('alamat', 'LIKE', '%'.$query.'%')
                ->orWhere('hp', 'LIKE', '%'.$query.'%')
                ->paginate(5);
        } else {
            $pegawai = PegawaiModel::paginate(5);
        }
        return view('pegawai.pegawai', ['pegawai' => $pegawai]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('pegawai.create_pegawai')
        ->with('url_form',url('/pegawai'));
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
            'kode_pegawai' => 'required|string|max:10|unique:pegawai,kode_pegawai',
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:L,P',
            'alamat' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,15',
        ]);

        $data = PegawaiModel::create($request->except(['_token']));

        //jika berhasil
        return redirect('pegawai')
                ->with('success', 'pegawai Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(PegawaiModel $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = PegawaiModel::find($id);
        return view('pegawai.create_pegawai')
                    ->with('pegawai',$pegawai)
                    ->with('url_form',url('/pegawai/'.$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request ->validate([
                'kode_pegawai' => 'required|string|max:10|unique:pegawai,kode_pegawai,'.$id,
                'nama' => 'required|string|max:50',
                'jk' => 'required|in:L,P',
                'alamat' => 'required|string|max:50',
                'hp' => 'required|digits_between:6,15',

        ]);

        $data = PegawaiModel::where('id', '=', $id)->update($request->except(['_token','_method']));
        return redirect('pegawai')
            ->with('success','pegawai Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PegawaiModel::where('id', '=', $id)->delete();
        return redirect('pegawai')
        ->with ('success', 'pegawai Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $ice = IceCreamModel::count();
        $pegawai = PegawaiModel::count();

        $keyword = $request->input('keyword');
        $column = $request->input('column');

        $query = PegawaiModel::query();

        if ($column == 'Kode') {
            $query->where('kode_pegawai', 'LIKE', "%$keyword%");
        } elseif ($column == 'Nama') {
            $query->where('nama', 'LIKE', "%$keyword%");

        $results = $query->get();

        return view('pegawai.search_pegawai', ['results' => $results])
            ->with('ice', $ice)
            ->with('pegawai', $pegawai);
    }
}
}
