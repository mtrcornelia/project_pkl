@extends('backend.layout.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Client</h1>
       
      </div>

@if (session()->has('pesan'))

	<div class="alert alert-success" role="alert">
		{{ session('pesan') }}
	</div>
@endif
<a href="/client/create" class="btn btn-primary mb-3">Tambah Data</a>
<table class="table table-bordered">
	<tr class="text-center">
		<th>ID</th>
		<th>client Name</th>
		<th>client Address </th>
		<th>Aksi</th>
	</tr>

	@foreach($tb_m_clients as $tb_m_client)
	<tr>
		
		<td>{{$tb_m_client->id}}</td>
		<td>{{$tb_m_client->client_name}}</td>
		<td>{{$tb_m_client->client_address}}</td>
		<td>
			<a href="/client/{{$tb_m_client->id}}/edit" class="btn btn-warning btn-small">Edit</a>
			<form action="/client/{{$tb_m_client->id}}" method="POST" class="d-inline">
				@method('DELETE')
				@csrf
				<button class="btn btn-danger btn-small" type="submit" onclick="return confirm('yakin akan menghapus data?')">Delete</button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
{{$tb_m_clients->links('pagination::bootstrap-5')}}
@endsection