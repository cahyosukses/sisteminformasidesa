<?php

namespace App\Http\Controllers\Lib;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Agama;
use App\Http\Requests\Libs\AgamaRequest;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agama = Agama::paginate(10);
        return view('dashboard.pustaka.agama.index', compact('agama'));
    }

    public function cari(Request $request)
    {
      $keyword = $request['keyword'];
      $agama = Agama::where('agama','=',$keyword)->paginate(10) ;
      return view('dashboard.pustaka.agama.index', compact('agama'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pustaka.agama.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgamaRequest $request)
    {
        $data=$request->all();
        Agama::create($data);
        alert()->overlay('Selamat', 'Tambah Nama Agama Berhasil!', 'success');
        return redirect('agama');
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
      $agama = Agama::find($id);
      return view('dashboard.pustaka.agama.edit', compact('agama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgamaRequest $request, $id)
    {
        $data=$request->all();
        $agama = Agama::find($id);
        $agama->update($data);
        alert()->overlay('Selamat', 'Ubah Nama Agama Berhasil!', 'success');
        return redirect('agama');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agama = Agama::find($id);
        $agama->delete();
        alert()->overlay('Selamat', 'Hapus Nama Agama Berhasil!', 'success');
        return redirect('agama');
    }
}
