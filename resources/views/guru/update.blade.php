@extends('layouts.admin')
@section('updateguru')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Update Data Guru
        </div>
        <div class="card-body">
            <form method="post" action="/guru/update/{{ $guru->id }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Nama Guru :</label>
                    <input type="text" name="nama_guru" id="nama_guru" value="{{ old('nama_guru', $guru->nama_guru) }}" class="form-control @error('nama_guru') is-invalid @enderror">
                    @error('nama_guru')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <br><br>
                    <label>Mata pelajaran yang dipegang:</label>
                    <select class="custom-select @error('kode_mapel') is-invalid @enderror" aria-label="Default select example" id="kode_mapel" name="kode_mapel">
                        <option selected disabled>mata pelajaran</option>
                        @foreach ($mapel as $m)
                            <option value="{{ $m->id }}" {{ old('kode_mapel', $guru->kode_mapel) == $m->id ? 'selected' : '' }}>{{ $m->nama_mapel }}</option>
                        @endforeach
                    </select>
                    @error('kode_mapel')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <br><br>
                    <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
