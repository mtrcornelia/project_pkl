@extends('frontend.layout.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Client</h1>
       
      </div>

@if (session()->has('pesan'))

	<div class="alert alert-success" role="alert">
		{{ session('pesan') }}
	</div>
@endif

<table class="table table-bordered">
	<tr class="text-center">
		<th class="table-success">ID</th>
		<th class="table-success" >client Name</th>
		<th class="table-success">client Address </th>
		
	</tr>

	@foreach($tb_m_clients as $tb_m_client)
	<tr>
		
		<td>{{$tb_m_client->id}}</td>
		<td>{{$tb_m_client->client_name}}</td>
		<td>{{$tb_m_client->client_address}}</td>
		
	</tr>
	@endforeach
</table>
{{$tb_m_clients->links('pagination::bootstrap-5')}}
@endsection