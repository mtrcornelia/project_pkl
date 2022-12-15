@extends('backend.layout.main')
<!--    @section('title','Gallery') -->
   

    @section('container')
<div class="row">
  <div class="col-lg-6">
        <form action="/client" method="POST">
@csrf
      <div class="mb-3">
        <label  class="form-label">Client Name</label>
        <input type="text" class="form-control @error('client_name')is-invalid @enderror" id="client_name " value="{{old('client_name')}}" name="client_name">
        @error('client_name')
            <div class="invalid-feedback">
             {{$message}}
            </div>
        @enderror
      </div>


      <div class="mb-3">
        <label class="form-label">Client Address</label>
        <textarea class="form-control @error('client_address') is-invalid @enderror"  name="client_address" rows="3" ></textarea>
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
