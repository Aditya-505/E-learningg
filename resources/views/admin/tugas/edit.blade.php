@extends('layouts.backend')
@section('content')

<section class="tab-components">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Edit tugas</h2>
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
                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('tugas.update', $tuga) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-style mb-30">
                            <div class="input-style-1">
                                <label>Judul</label>
                                <input type="text" name="judul" value="{{ old('judul', $tuga->judul) }}" required />
                            </div>
                            
                            <div class="input-style-1">
                                <label>Mapel</label>
                                <div class="select-style-1">
                                    <div class="select-position">
                                        <select name="id_mapel" required>
                                            <option disabled value="">Pilih Mapel</option>
                                            @foreach($mapel as $m)
                                                <option value="{{ $m->id }}" 
                                                    {{ old('id_mapel', $tuga->id_mapel) == $m->id ? 'selected' : '' }}>
                                                    {{ $m->nama_mapel }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="input-style-1">
                                <label>Tenggat Waktu</label>
                                <input type="datetime-local" name="tenggat_waktu" class="form-control" value="{{ old('tenggat_waktu', $tuga->tenggat_waktu) }}"  r>
                            </div>
                        </div>

                        @foreach ($tuga->soal as $i => $item)
                            <div class="card-style mb-30">
                                <div class="input-style-1">
                                    <label>Soal {{ $i+1 }}</label>
                                    <input type="text" name="soal[{{ $i }}]" 
                                           value="{{ old('soal.'.$i, $item->pertanyaan) }}" required />
                                </div>
                                
                                <label>Pilihan Jawaban</label><br>
                                @foreach(['A', 'B', 'C', 'D'] as $opt)
                                    <div style="margin-bottom: 10px;">
                                        <input type="radio" name="jawaban_benar[{{ $i }}]" 
                                               value="{{ $opt }}" 
                                               id="jawaban_{{ $i }}_{{ $opt }}"
                                               {{ old('jawaban_benar.'.$i, $item->jawaban_benar) == $opt ? 'checked' : '' }}>
                                        <label for="jawaban_{{ $i }}_{{ $opt }}">{{ $opt }}</label>
                                        <input type="text" name="opsi[{{ $i }}][{{ $opt }}]" 
                                               value="{{ old('opsi.'.$i.'.'.$opt, $item['pilihan_'.strtolower($opt)]) }}" 
                                               required style="margin-left: 10px;" />
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('tugas.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection