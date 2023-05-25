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
<form action="/project">
	<div class="row">
		<div class="col-lg-2 mb-2 mt-2">
			<label for="">Nama Project</label>
			<input type="name" class="form-control filter" placeholder="name" id="name " name="name">	
		</div>
		<div class="col-lg-2 ">
			<label class="form-label">Client Id</label>
			<select class="form-select filter" name="client" id="client" aria-label="Default select example">
			<option value="" selected>All Client</option>
				@foreach($tb_m_clients as $tb_m_client)
				@if (old('client_id')==$tb_m_client->id)
				
				<option value="{{$tb_m_client->id}}" >{{$tb_m_client->client_name}}</option>
				@else
				<option value="{{$tb_m_client->id}}">{{$tb_m_client->client_name}}</option>
				@endif
				@endforeach
			</select>
		</div> 
		<div class="col-lg-2 ">
			<label class="form-label">Status</label>
			<select class="form-select filter" name="status" id="status" aria-label="Default select example">
				<option value="" selected>All Status</option>
				<option value="OPEN" >OPEN</option>
				<option value="DOING">DOING</option>
				<option value="DONE">DONE</option>
			</select>
		</div>
		<div class="col-lg-1 mt-4">
			<label for="" class="form-label"></label>
			<button type="submit" class="btn btn-primary btn-sm">Search</button>
		</div>
		<div class="col-lg-1 mt-4">
			<label for="" class="form-label"></label>
			<button type="button" onclick="window.location.href='/project'" class="btn btn-secondary btn-sm">Clear</button>
		</div>

	</div>
</form>
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