<?php

namespace App\Http\Controllers;

use App\Models\Tb_m_project;
use App\Models\Tb_m_client;
use Illuminate\Http\Request;

class TbMProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if($request->has('name')){
            $tb_m_projects = Tb_m_project::join('tb_m_clients', 'tb_m_projects.client_id', '=', 'tb_m_clients.id')
            ->where('tb_m_projects.client_id','LIKE','%'.$request->client.'%')
            ->where('tb_m_projects.project_name','LIKE','%'.$request->name.'%')
            ->where('tb_m_projects.project_status','LIKE','%'.$request->status.'%')
            
            ->paginate(6);
            
        }
        else{
            $tb_m_projects = Tb_m_project::latest()->paginate(6);
            
        }
        $tb_m_clients =Tb_m_client::all();
      

        // if($request->has('searchCient')){
        //     $tb_m_clients = Tb_m_client::where('client_id','LIKE','%'.$request->searchCient.
        //     '%')->paginate(6);

        // }
        // else{
        //     $tb_m_clients =Tb_m_client::latest()->paginate(6);
        // }
    //    return view ('backend.project.index',compact('tb_m_projects'));
         return view('backend.project.index', compact('tb_m_projects', 'tb_m_clients'));

        

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('backend.project.create',[
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
            'project_name'=>'required',
            'client_id'=>'required',
            'project_start'=>'required',
            'project_end'=>'required',
            'project_status'=>'required'

       ]);

       Tb_m_project::create($validateData);
       return redirect('/project')->with('pesan','data berhasil di tambahkan');
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
    public function edit(Tb_m_project $tb_m_project,$id)
    {
         return view('backend.project.edit', [
            'tb_m_projects' =>Tb_m_project::find($id),
            'tb_m_clients'=>Tb_m_client::all()
            
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tb_m_project  $tb_m_project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tb_m_project $tb_m_project,$id)
    {
       $validateData =$request->validate([
            'project_name'=>'required',
            'client_id'=>'required',
            'project_start'=>'required',
            'project_end'=>'required',
            'project_status'=>'required'
       ]);

        Tb_m_project::where('id',$id)->update($validateData);
       return redirect('/project')->with('pesan','data berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tb_m_project  $tb_m_project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tb_m_project $tb_m_project,$id)
    {
        Tb_m_project::destroy($id);
         return redirect('/project')->with('pesan','data berhasil dihapus');
    }
}

