@extends('layouts.admin')
@section('createjurusan')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Create Data Jurusan
        </div>
        <div class="card-body">
            <form method="post" action="/jurusan/store">
                @csrf
                <div class="form-group">
                    <label>Nama Jurusan :</label>
                    <input type="text" name="jurusan" id="jurusan" autocomplete="off" class="form-control @error('jurusan') is-invalid @enderror" value="{{ old('jurusan') }}">
                    @error('jurusan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <br><br>
                    <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
                </div>
            </form>
            <a class="btn btn-light" href="{{ route('jurusan') }}" role="button">Kembali</a>
        </div>
    </div>
</div>
@endsection
