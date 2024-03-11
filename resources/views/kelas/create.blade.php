@extends('layouts.admin')

@section('createkelas')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Create Data Kelas
        </div>

        <div class="card-body">
            <form method="post" action="{{ url('/kelas/store') }}">
                @csrf

                <div class="form-group">
                    <label>Kelas:</label>
                    <input type="text" name="tingkat" id="tingkat" autocomplete="off" class="form-control {{ $errors->has('tingkat') ? 'is-invalid' : '' }}" value="{{ old('tingkat') }}">
                    @if ($errors->has('tingkat'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tingkat') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Nama Jurusan</label>
                    <select class="custom-select {{ $errors->has('kode_jurusan') ? 'is-invalid' : '' }}" aria-label="Default select example" id="kode_jurusan" name="kode_jurusan">
                        <option selected disabled>Data Jurusan</option>
                        @foreach ($jurusan as $j)
                            <option value="{{ $j->id }}">{{ $j->jurusan }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('kode_jurusan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kode_jurusan') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Nama Wali Kelas:</label>
                    <select class="custom-select {{ $errors->has('kode_guru') ? 'is-invalid' : '' }}" aria-label="Default select example" id="kode_guru" name="kode_guru">
                        <option selected disabled>Data Guru</option>
                        @foreach ($guru as $g)
                            <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('kode_guru'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kode_guru') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Tipe kelas:</label>
                    <input type="text" name="tipe" id="tipe" autocomplete="off" class="form-control {{ $errors->has('tipe') ? 'is-invalid' : '' }}" value="{{ old('tipe') }}">
                    @if ($errors->has('tipe'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tipe') }}
                        </div>
                    @endif
                </div>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
                </div>
            </form>
            <a class="btn btn-light" href="{{ route('kelas') }}" role="button">Kembali</a>
            <a class="btn btn-info" href="{{ route('kelas') }}" role="button">Data sudah terinput</a>
        </div>
    </div>
</div>
@endsection
