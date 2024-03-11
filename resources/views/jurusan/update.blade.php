@extends('layouts.admin')
@section('updatejurusan')
<div class="container-fluid">
            
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Update Data Jurusan
        </div>

        <div class="card-body">
            @foreach ($jurusan as $j)
                <form method="post" action="/jurusan/update/{{ $j->id }}"  >
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="jurusan">Nama Jurusan :</label>
                        <input type="text" name="jurusan" id="jurusan" autocomplete="off" value="{{ $j->jurusan }}" class="form-control">
                        @error('jurusan')
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
