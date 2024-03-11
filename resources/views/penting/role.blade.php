@extends('layouts.admin')
@section('rolecreate')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Create Data role
        </div>

        <div class="card-body">
            <form method="post" action="/role/store">
                @csrf
                <div class="form-group">
                    <label for="nama_role">Nama Role :</label>
                    <input type="text" name="nama_role" id="nama_role" autocomplete="off" class="form-control {{ $errors->has('nama_mapel') ? 'is-invalid' : '' }}" value="{{ old('nama_mapel') }}">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                </div>

                <br><br>
                <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
            </form>
            {{-- <a class="btn btn-light" href="{{ route('mapel') }}" role="button">Kembali</a> --}}
        </div>
    </div>
</div>
@endsection
