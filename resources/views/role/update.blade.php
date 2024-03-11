@extends('layouts.admin')

@section('updaterole')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Update Data Role
        </div>

        <div class="card-body">
            @foreach ($role as $r)
                <form method="post" action="/role/update/{{ $r->id }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nama_role">Nama Role:</label>
                        <input type="text" name="nama_role" id="nama_role" value="{{ $r->nama_role }}" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
                </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
