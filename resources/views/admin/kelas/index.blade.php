@extends('layouts.backend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-4">
                <div class="title">
                  <h2>Data kelas</h2>
                </div>
              </div>
        <div class="col-md-12 mt-4">
            <div class="card-style-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
    <div>
        <a href="{{ route('kelas.create') }}" class="btn btn-primary">
            <i class="mdi mdi-plus-box"></i> Tambah
        </a>
    </div>
    <form action="{{ route('kelas.index') }}" method="get" class="d-flex" style="max-width: 300px;">
        <button class="btn btn-outline-primary btn-sm" type="submit">
            <i class="lni lni-search-alt"></i>
        </button>
    </form>
</div>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table" id="tabelPetugas">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kelas<i class="lni lni-arrows-vertical"></i></th>
                            <th scope="col">Aksi<i class="lni lni-arrows-vertical"></i></th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $no = 1; @endphp
                          @foreach ($kelas as $data)
                          <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $data->kelas }}</td>
                           <td>
                                        <div class="action justify-content">
                                            <div class="dropdown">
                                                <button class="more-btn ml-10 dropdown-toggle" id="moreAction1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="lni lni-more-alt"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction1">
                                                    <li>
                                                        <a href="{{ route('kelas.edit', $data->id) }}" class="dropdown-item">
                                                            <i class="mdi mdi-pencil"></i> Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('kelas.destroy', $data->id) }}" method="post" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Apakah anda yakin?')">
                                                                <i class="lni lni-trash-can"></i> Delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
