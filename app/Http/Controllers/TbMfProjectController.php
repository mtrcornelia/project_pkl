<?php

namespace App\Http\Controllers;

use App\Models\Tb_m_project;
use Illuminate\Http\Request;

class TbMfProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('frontend.project.index',[
        'tb_m_projects'=>Tb_m_project::latest()->paginate(6)
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
     * @param  \App\Models\Tb_m_project  $tb_m_project
     * @return \Illuminate\Http\Response
     */
    public function show(Tb_m_project $tb_m_project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tb_m_project  $tb_m_project
     * @return \Illuminate\Http\Response
     */
    public function edit(Tb_m_project $tb_m_project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tb_m_project  $tb_m_project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tb_m_project $tb_m_project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @param  \App\Models\Tb_m_project  $tb_m_project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tb_m_project $tb_m_project)
    {
        //
    }
}
