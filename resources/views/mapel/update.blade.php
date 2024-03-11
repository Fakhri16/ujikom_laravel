@extends('layouts.admin')

@section('updateguru')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Update Data Mata Pelajaran
        </div>

        <div class="card-body">
            @foreach ($mapel as $m)
                <form method="post" action="/mapel/update/{{ $m->id }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nama_mapel">Nama Mapel:</label>
                        <input type="text" name="nama_mapel" id="nama_mapel" value="{{ $m->nama_mapel }}" class="form-control" required>
                        @error('nama_mapel')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
                </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
