<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;use 
Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function read()
    {
        $barang = Barang::all();
        return view('barang.read', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $validated = $request->validate( [
            'nama' => 'required|max:55',
            'jenis' => 'required|max:55',
            'merk' => 'required|max:55',
            'jumlah' => 'required',
        ]);

        
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:55',
            'jenis' => 'required|max:55',
            'merk' => 'required|max:55',
            'jumlah' => 'required',
        ]);

        if ($validator->fails()){
           return response()->json(['errors'=>$validator->errors()->all()]);
        }

       
        
        $data = new Barang();
        $data->nama_barang = $validated['nama'];
        $data->jenis = $validated['jenis'];
        $data->merk = $validated['merk'];
        $data->qty = $validated['jumlah'];
        $data->save();

        return response()->json([
            'status' => 200
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
