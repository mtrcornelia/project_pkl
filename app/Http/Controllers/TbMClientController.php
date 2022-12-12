<?php

namespace App\Http\Controllers;

use App\Models\Tb_m_client;
use Illuminate\Http\Request;

class TbMClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view ('backend.client.index',[
        'tb_m_clients'=>Tb_m_client::latest()->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.client.create',[
        'tb_m_clients'=>Tb_m_client::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData =$request->validate([
            'client_name'=>'required',
            'client_address'=>'required'
       ]);

       Tb_m_client::create($validateData);
       return redirect('/client')->with('pesan','data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tb_m_client  $tb_m_client
     * @return \Illuminate\Http\Response
     */
    public function show(Tb_m_client $tb_m_client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tb_m_client  $tb_m_client
     * @return \Illuminate\Http\Response
     */
public function edit(Tb_m_client $tb_m_client,$id)
    {
         return view('backend.client.edit', [
            'tb_m_clients' =>Tb_m_client::find($id),
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tb_m_client $tb_m_client,$id)
    {
          $validateData =$request->validate([
            'client_name'=>'required',
            'client_address'=>'required'
       ]);

       Tb_m_client::where('id',$id)->update($validateData);
       return redirect('/client')->with('pesan','data berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tb_m_client $tb_m_client,$id)
    {
         Tb_m_client::destroy($id);
         return redirect('/client')->with('pesan','data berhasil dihapus');
    }
}
