@extends('layouts.admin')
@section('updateabsensi')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Update Data Absensi
        </div>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <td>data ke</td>
                    <td>Nama Siswa</td>
                    <td>kelas</td>
                    <td>Absensi</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $absensi->id }}</td>
                    <td>{{ $siswaOptions[$absensi->siswa_id] }}</td>
                    <td>{{ $siswaKelas[$absensi->siswa_id] }}</td>
                    <td>
                        <form method="post" action="/absensi/update/{{ $absensi->id }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <input type="hidden" name="siswa_id" value="{{ $absensi->siswa_id }}">
                                    <input type="hidden" name="siswakelas" value="{{ $siswaKelas[$absensi->siswa_id] }}">
                                    <select name="guru_id" class="custom-select">
                                        <option value="">Pilih Guru</option>
                                        @foreach($guruOptions as $id => $namaGuru)
                                            <option value="{{ $id }}" {{ $id == $absensi->guru_id ? 'selected' : '' }}>{{ $namaGuru }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="date" name="tanggal" class="form-control form-control-sm" required value="{{ $absensi->tanggal }}">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <select class="custom-select" name="status" required>
                                        <option value="Hadir" {{ $absensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                        <option value="Sakit" {{ $absensi->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                        <option value="Izin" {{ $absensi->status == 'Izin' ? 'selected' : '' }}>Izin</option>
                                        <option value="Alpha" {{ $absensi->status == 'Alpha' ? 'selected' : '' }}>Alpha</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <input type="text" name="deskripsi" class="form-control" value="{{ $absensi->deskripsi }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
