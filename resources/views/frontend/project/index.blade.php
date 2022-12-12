@extends('frontend.layout.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Project</h1>
       
      </div>

@if (session()->has('pesan'))

	<div class="alert alert-success" role="alert">
		{{ session('pesan') }}
	</div>
@endif

<table class="table table-bordered">
	<tr class="text-center">
		<th class="table-info">ID</th>
		<th class="table-info">Project Name</th>
		<th class="table-info">client Id </th>
		<th class="table-info">Project Start  </th>
		<th class="table-info">Project End</th>
		<th class="table-info">Status Project</th>
		
	</tr>

	@foreach($tb_m_projects as $tb_m_project)
	<tr>
		
		<td>{{$tb_m_project->id}}</td>
		<td>{{$tb_m_project->project_name}}</td>
		<td>{{$tb_m_project->client_id}}</td>
		<td>{{$tb_m_project->project_start}}</td>
		<td>{{$tb_m_project->project_end}}</td>
		<td>{{$tb_m_project->project_status}}</td>
		
	</tr>
	@endforeach
</table>
{{$tb_m_projects->links('pagination::bootstrap-5')}}
@endsection