@extends('layouts.backend')
@section('content')

<section class="tab-components">
    <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="title">
              <h2>Show Data Tugas</h2>
            </div>
          </div>
          <!-- end col -->
          <div class="col-md-6">
            <div class="breadcrumb-wrapper">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#0">Show</a></li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- ========== title-wrapper end ========== -->

      <!-- ========== form-elements-wrapper start ========== -->
      <div class="form-elements-wrapper">
        <div class="row">
            <form action="{{ Route('materi.update', $materi->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
          <div class="col-lg-12">
            <!-- input style start -->
            <div class="card-style mb-30">
              <h6 class="mb-25">Show</h6>
              <div class="input-style-1">
                <label>Judul</label>
                <input type="text" name="judul" required class="@error('judul') is-invalid @enderror" value="{{ $materi->judul }}" readonly />
              </div>
              <!-- end input -->
              <div class="input-style-2">
                <div class="select-style-1">
                    <label>Isi Materi</label>
                    <div class="select-position">
                        <input type="text" name="isi_materi" required class="@error('isi_materi') is-invalid @enderror" value="{{ $materi->isi_materi }}" readonly />
                    </div>
                  </div>
              </div>
              <div class="input-style-2">
                <div class="select-style-1">
                    <label>Mapel</label>
                    <div class="select-position">
                        <input type="text" name="mapel" required class="@error('mapel') is-invalid @enderror" value="{{ $materi->mapel->nama_mapel }}" readonly />
                    </div>
                  </div>
              </div>
              <!-- end input -->
              <div class="input-style-2">
                <div class="select-style-1">
                    <label>Kelas</label>
                    <div class="select-position">
                        <input type="text" name="kelas" required class="@error('kelas') is-invalid @enderror" value="{{ $materi->kelas->kelas }}" readonly />
                    </div>
                  </div>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{route('materi.index')}}" class="btn btn-dark">Kembali</a>
              <!-- end input -->
            </div>
            <!-- end card -->
            <!-- ======= input style end ======= -->
          </div>
          <!-- end col -->
        </form>
        </div>
        <!-- end row -->
      </div>
      <!-- ========== form-elements-wrapper end ========== -->
    </div>
    <!-- end container -->
  </section>

@endsection