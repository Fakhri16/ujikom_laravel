@extends('layouts.admin')
@section('createmapel')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Create Data Mapel
        </div>

        <div class="card-body">
            <form method="post" action="{{ url('/mapel/store') }}">
                @csrf
                <div class="form-group">
                    <label for="nama_mapel">Nama Mapel :</label>
                    <input type="text" name="nama_mapel" id="nama_mapel" autocomplete="off" class="form-control {{ $errors->has('nama_mapel') ? 'is-invalid' : '' }}" value="{{ old('nama_mapel') }}">
                    @if ($errors->has('nama_mapel'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_mapel') }}
                        </div>
                    @endif
                </div>

                <br><br>
                <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
            </form>
            <a class="btn btn-light" href="{{ route('mapel') }}" role="button">Kembali</a>
        </div>
    </div>
</div>
@endsection
