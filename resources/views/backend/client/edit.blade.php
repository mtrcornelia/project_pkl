
@extends('backend.layout.main')
<!--    @section('title','Gallery') -->
   

    @section('container')
<div class="row">
  <div class="col-lg-6">
        <form action="/client/{{$tb_m_clients->id}}" method="POST">
@method('PUT')
@csrf
      
      <div class="mb-3">
        <label class="form-label">Nama Client</label>
        <input type="nama" class="form-control" id="client_name" name="client_name" value="{{ old ('client_name',$tb_m_clients->client_name)}}">
         @error('client_name')
            <div class="invalid-feedback">
             {{$message}}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea class="form-control @error('client_address') is-invalid @enderror"  name="client_address" rows="3" >{{ old('client_address',$tb_m_clients->client_address)}}</textarea>
         @error('client_address')
            <div class="invalid-feedback">
             {{$message}}
            </div>
        @enderror
      </div> 



     

      <div class="mb-3">
        <button type="submit" name="submit" class="btn btn-primary">Create</button> 
      </div>


    </form>
  </div>
</div>

@endsection


      