<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Dotenv\Validator;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('barang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'halo';
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

        // if($validated->fails()){
        //     return response()->json([
        //         'status' => 400,
        //         'errors' => $validated->messages()
        //     ]);
        // }
        // else{

        // }
        
        $data = new Barang();
        $data->nama_barang = $validated['nama'];
        $data->jenis = $validated['jenis'];
        $data->merk = $validated['merk'];
        $data->qty = $validated['jumlah'];
        $data->save();
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
