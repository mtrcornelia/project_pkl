<?php

namespace App\Http\Controllers;

use App\Models\Tb_m_client;
use Illuminate\Http\Request;

class TbMfClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
         return view ('frontend.client.index',[
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
        //
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
    public function edit(Tb_m_client $tb_m_client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tb_m_client  $tb_m_client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tb_m_client $tb_m_client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tb_m_client  $tb_m_client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tb_m_client $tb_m_client)
    {
        //
    }
}
