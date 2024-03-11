@extends('layouts.admin')
@section('creatregister')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Register
        </div>
        <div class="card-body">
            <form method="post" action="/register/store">
                @csrf
                <div class="form-group">
                    <label for="guru_id">Nama Wali Kelas:</label>
                    <select class="custom-select" id="guru_id" name="guru_id" required>
                        <option value="" selected disabled>Pilih Guru</option>
                        @foreach ($dataGuru as $g)
                            <option value="{{$g->id}}">{{$g->nama_guru}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="role[]">Role</label>
                    <select class="custom-select" id="role[]" name="role[]" required>
                        <option value="" selected disabled>Pilih Role</option>
                        @foreach ($role as $r)
                            <option value="{{$r->id}}">{{$r->nama_role}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" autocomplete="off" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" autocomplete="off" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
