@extends('layouts.admin')

@section('createabsensisiswa')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Create Data Presensi
        </div>
        <div class="card-body">
            <form method="post" action="/absensi/store">
                @csrf
                <div class="table-responsive">
                    <table id="entries" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Absensi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siswaOptions as $siswaId => $siswaNama)
                                <tr>
                                    <td>{{$loop->iteration }}</td>
                                    <td>{{ $siswaNama }}</td>
                                    <td>{{ $siswaKelas[$siswaId] }}</td>
                                    <td>
                                        <form method="post" action="/absensi/store">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <input type="hidden" name="siswa_id" value="{{ $siswaId }}">
                                                    <input type="hidden" name="siswakelas" value="{{ $siswaKelas[$siswaId] }}">
                                                    <select name="guru_id" class="custom-select" required>
                                                        <option value="">Pilih Guru</option>
                                                        @foreach($guruOptions as $id => $namaGuru)
                                                            <option value="{{ $id }}">{{ $namaGuru }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input type="date" name="tanggal" class="form-control form-control-sm" required>
                                                </div>
                                                <div class="col-md-2 mb-2">
                                                    <select class="custom-select" name="status" required>
                                                        <option value="Hadir">Hadir</option>
                                                        <option value="Sakit">Sakit</option>
                                                        <option value="Izin">Izin</option>
                                                        <option value="Alpha">Alpha</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 mb-2">
                                                    <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              
        </div>
    </div>
</div>
@endsection
