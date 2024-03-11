@extends('layouts.admin')
@section('createguru')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Create Data Guru
        </div>
        <div class="card-body">
            <form method="post" action="/guru/store">
                @csrf
                <div class="form-group">
                    <label>Nama Guru :</label>
                    <input type="text" name="nama_guru" id="nama_guru" autocomplete="off" class="form-control @error('nama_guru') is-invalid @enderror" value="{{ old('nama_guru') }}">
                    @error('nama_guru')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <br>
                    <label>Mata pelajaran yang dipegang:</label>
                    <select class="custom-select @error('kode_mapel') is-invalid @enderror" aria-label="Default select example" id="kode_mapel" name="kode_mapel">
                        <option selected disabled>mata pelajaran</option>
                        @foreach ($mapel as $m)
                            <option value="{{ $m->id }}" {{ old('kode_mapel') == $m->id ? 'selected' : '' }}>{{ $m->nama_mapel }}</option>
                        @endforeach
                    </select>
                    @error('kode_mapel')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <br><br>
                    <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
                </div>
            </form>
            <a class="btn btn-light" href="{{ route('guru') }}" role="button">Kembali</a>
            <a class="btn btn-info" href="{{ route('guru') }}" role="button">Data sudah terinput</a>
        </div>
    </div>
</div>
@endsection
