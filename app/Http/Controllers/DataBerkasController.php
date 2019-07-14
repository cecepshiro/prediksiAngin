<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataBerkas;
use App\DataProcessing;

class DataBerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data']=DataBerkas::get();
        return view('upload_pelatihan.index')
        ->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload_pelatihan.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($file=$request->file('file')){
            if($file->getClientOriginalExtension()=="csv"){
                $name=("Latih".time()).".".$file->getClientOriginalExtension();
                $file->move('data_pelatihan',$name);
                $berkas=$name;
            }else{
                return "Format tidak didukung";
            }
        }
        
        $namaStasiun = $request->input('namaStasiun');
        $panjangData = $request->input('panjangData');
        $file = $request->input('file');
        $keterangan = $request->input('keterangan');
        $data = new DataBerkas();
        $data->file = $berkas;
        $data->keterangan = $keterangan;
        $data->save();
        if($data->save()){
             //simpan data pelatihan
            $data2 = new DataProcessing();
            $data2->namaStasiun = $namaStasiun;
            $data2->panjangData = $panjangData;
            $data2->namaModel = $berkas;
            $data2->save();
            return redirect('uploaddata/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data']=DataBerkas::find($id);
        return view('upload_pelatihan.detail')
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
        $data['data']=DataBerkas::find($id);
        return view('upload_pelatihan.form_ubah')
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
        $file = $request->input('file');
        $keterangan = $request->input('keterangan');
        $data = DataBerkas::where('id',$id)->first();
        $data->file = $file;
        $data->keterangan = $keterangan;
        $data->save();
        return redirect('uploaddata/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataBerkas::where('id',$id)->delete();
        return redirect('uploaddata/index');
    }
}
