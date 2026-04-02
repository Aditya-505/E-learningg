@extends('layouts.backend')
@section('content')

<section class="tab-components">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>{{ $tugas->judul }}</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#0">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#0">tugas</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit tugas
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========== title-wrapper end ========== -->

        <!-- ========== form-elements-wrapper start ========== -->
        <div class="form-elements-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-style mb-30">
                            <div class="input-style-1">
                                <label>Judul</label>
                                <input type="text" name="judul" value="{{ $tugas->judul }}" disabled/>
                            </div>
                            <div class="input-style-1">
                                <label>Mapel</label>
                                <input type="text" name="mapel" value="{{ $tugas->mapel->nama_mapel }}" disabled/>
                            </div>
                        </div>

                        @foreach ($tugas->soal as $i => $item)
                            <div class="card-style mb-30">
                                <div class="input-style-1">
                                    <label>Soal {{ $i+1 }}</label>
                                    <input type="text" name="soal[{{ $i }}]" value="{{ $item->pertanyaan }}" disabled/>
                                </div>
                                <label>Pilihan Jawaban</label><br>
                                @foreach(['A', 'B', 'C', 'D'] as $opt)
                                    <div>
                                        <input type="radio" name="jawaban_benar[{{ $i }}]" value="{{ $opt }}" disabled {{ $item->jawaban_benar == $opt ? 'checked' : '' }}> {{ $opt }}
                                        <input type="text" name="opsi[{{ $i }}][{{ $opt }}]" value="{{ $item['pilihan_'.strtolower($opt)] }}" disabled/>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
