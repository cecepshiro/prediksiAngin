<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataProcessing;
use App\Jobs\latih;

class DataProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data']=DataProcessing::get();
        return view('data_pelatihan.index')
        ->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_pelatihan.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $namaStasiun = $request->input('namaStasiun');
        $panjangData = $request->input('panjangData');
        $namaModel = $request->input('namaModel');
        $status = $request->input('status');
        $data = new DataProcessing();
        $data->namaStasiun = $namaStasiun;
        $data->panjangData = $panjangData;
        $data->namaModel = $namaModel;
        $data->status = $status;
        $data->save();
        return redirect('pelatihan/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data']=DataProcessing::find($id);
        return view('data_pelatihan.detail')
        ->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data']=DataProcessing::find($id);
        return view('data_pelatihan.form_ubah')
        ->with($data);
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
        $namaStasiun = $request->input('namaStasiun');
        $panjangData = $request->input('panjangData');
        $namaModel = $request->input('namaModel');
        $status = $request->input('status');
        $data = DataProcessing::where('id',$id)->first();
        $data->namaStasiun = $namaStasiun;
        $data->panjangData = $panjangData;
        $data->namaModel = $namaModel;
        $data->status = $status;
        $data->save();
        return redirect('pelatihan/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataProcessing::where('id',$id)->delete();
        return redirect('pelatihan/index');
    }

    public function latih($id)
    {
        $status = "Sedang dilatih";
        $data = DataProcessing::where('id',$id)->first();
        $data->status = $status;
        $data->save();
        latih::dispatch('test');
        return redirect('pelatihan/index');

        
    }
}
