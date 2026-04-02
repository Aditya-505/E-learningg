@extends('layouts.backend')
@section('content')
<div class="container">

<form action="{{route('kelas.store')}}" method="POST">
    @csrf
          <div class="form-elements-wrapper">
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <!-- input style start -->
                <div class="card-style mb-30 mt-5">
                  <h6 class="mb-25">Input Fields</h6>
                  <div class="input-style-1">
                    <label>kelas</label>
                    <input type="text" placeholder="Nama kelas" name="kelas" />
  
                  </div>
                  <div class="input-style-1">
                    <button type="submit" class="btn btn-primary mr-2 mt-3">Simpan</button>
                      <a href="{{ route('kelas.index') }}" class="btn btn-dark mt-3">Kembali</a>
  
                  </div>
                </div>
              <!-- end col -->
              
              <!-- end col -->
            </div>
          </form>
            <!-- end row -->
          </div>
          
</div>
@endsection