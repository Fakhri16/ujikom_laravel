@extends('layouts.admin')
@section('updateregister')
<div class="container-fluid">
            
    <div class="card mt-3">
<div class="card-header bg-dark text-white">
Register
</div>
<div class="card-body">
<form method="post" action="{{ route('register.update', ['id' => $user->id]) }}">
        @csrf
        @method('PUT')
    <label>Nama Wali Kelas:</label>
    <select class="form-select" aria-label="Default select example" id="guru_id" name="guru_id">
      <option selected> Guru</option>
      @foreach ($dataGuru as $g)
      <option 
      value="{{$g->id}}">{{$g->nama_guru}}
      </option>
      @endforeach
      <br><br>
    </select>
    <br><br>
    <label for="">Role</label>
    <select class="form-select" aria-label="Default select example" id="role[]" name="role[]">
      <option selected> Role</option>
      @foreach ($role as $r)
      <option 
      value="{{$r->id}}">{{$r->nama_role}}
      </option>
      @endforeach
      <br><br>
    </select>
  <br><br>

    <label>Email </label>
  <input type="text" name="email" id="email" autocomplete="off"  value="{{ $user->email}}">
  <br><br>
  <label>password </label>
  <input type="password" name="password" id="password" autocomplete="off"  value="{{ $user->password}}">
  <br><br>
  <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
</form>
{{-- <a class="btn btn-light" href="{{route('jurusan')}}" role="button">kembali</a> --}}
  </div>
@endsection