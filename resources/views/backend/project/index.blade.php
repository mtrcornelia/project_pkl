@extends('backend.layout.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Project</h1>
       
      </div>

@if (session()->has('pesan'))

	<div class="alert alert-success" role="alert">
		{{ session('pesan') }}
	</div>
@endif
<a href="/project/create" class="btn btn-primary mb-3">Tambah Data</a>
<table class="table table-bordered">
	<tr class="text-center">
		<th>ID</th>
		<th>Project Name</th>
		<th>client Id </th>
		<th>Project Start  </th>
		<th>Project End</th>
		<th>Status Project</th>
		<th>Aksi</th>
	</tr>

	@foreach($tb_m_projects as $tb_m_project)
	<tr>
		
		<td>{{$tb_m_project->id}}</td>
		<td>{{$tb_m_project->project_name}}</td>
		<td>{{$tb_m_project->client_id}}</td>
		<td>{{$tb_m_project->project_start}}</td>
		<td>{{$tb_m_project->project_end}}</td>
		<td>{{$tb_m_project->project_status}}</td>
		<td>
			<a href="/project/{{$tb_m_project->id}}/edit" class="btn btn-warning btn-small">Edit</a>
			<form action="/project/{{$tb_m_project->id}}" method="POST" class="d-inline">
				@method('DELETE')
				@csrf
				<button class="btn btn-danger btn-small" type="submit" onclick="return confirm('yakin akan menghapus data?')">Delete</button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
{{$tb_m_projects->links('pagination::bootstrap-5')}}
@endsection