@extends('layouts.admin')
@section('updatekelas')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Update Data Kelas
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('/kelas/update', $kelas->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Kelas:</label>
                    <input type="text" name="tingkat" id="tingkat" autocomplete="off" value="{{ old('tingkat', $kelas->tingkat) }}" class="form-control @error('tingkat') is-invalid @enderror" required>
                    @error('tingkat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Jurusan</label>
                    <select class="custom-select @error('kode_jurusan') is-invalid @enderror" aria-label="Default select example" id="kode_jurusan" name="kode_jurusan" required>
                        <option selected disabled>Data Jurusan</option>
                        @foreach ($jurusan as $j)
                            <option value="{{ $j->id }}" {{ $j->id == $kelas->kode_jurusan ? 'selected' : '' }}>{{ $j->jurusan }}</option>
                        @endforeach
                    </select>
                    @error('kode_jurusan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Wali Kelas:</label>
                    <select class="custom-select @error('kode_guru') is-invalid @enderror" aria-label="Default select example" id="kode_guru" name="kode_guru" required>
                        <option selected disabled>Data Guru</option>
                        @foreach ($guru as $g)
                            <option value="{{ $g->id }}" {{ $g->id == $kelas->kode_guru ? 'selected' : '' }}>{{ $g->nama_guru }}</option>
                        @endforeach
                    </select>
                    @error('kode_guru')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Tipe kelas:</label>
                    <input type="text" name="tipe" id="tipe" autocomplete="off" value="{{ old('tipe', $kelas->tipe) }}" class="form-control @error('tipe') is-invalid @enderror" required>
                    @error('tipe')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
                <a class="btn btn-light" href="{{ route('kelas') }}" role="button">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
