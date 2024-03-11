@extends('layouts.admin')
@section('createsiswa')
<div class="container-fluid">
            
    <div class="card mt-3">
<div class="card-header bg-dark text-white">
Create Data Siswa 
</div>

<div class="card-body">
  <form method="post" action="/siswa/store">
    @csrf
    <div class="form-group">
        <label for="nisn">NISN:</label>
        <input type="number" name="nisn" id="nisn" autocomplete="off" class="form-control @error('nisn') is-invalid @enderror" value="{{ old('nisn') }}">
        @error('nisn')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="nama_siswa">Nama Siswa:</label>
        <input type="text" name="nama_siswa" id="nama_siswa" autocomplete="off" class="form-control @error('nama_siswa') is-invalid @enderror" value="{{ old('nama_siswa') }}">
        @error('nama_siswa')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="kode_kelas">Kelas:</label>
        <select class="custom-select @error('kode_kelas') is-invalid @enderror" aria-label="Default select example" id="kode_kelas" name="kode_kelas">
            <option selected disabled>Kelas</option>
            <optgroup label="RPL">
              <option value="10RPL1">10RPL1</option>
              <option value="10RPL2">10RPL2</option>
              <option value="11RPL1">11RPL1</option>
              <option value="11RPL2">11RPL2</option>
              <option value="12RPL1">12RPL1</option>
              <option value="12RPL2">12RPL2</option>
          </optgroup>
          <optgroup label="OTKP">
              <option value="10OTKP1">10OTKP1</option>
              <option value="10OTKP2">10OTKP2</option>
              <option value="11OTKP1">11OTKP1</option>
              <option value="11OTKP2">11OTKP2</option>
              <option value="12OTKP1">12OTKP1</option>
              <option value="12OTKP2">12OTKP2</option>
          </optgroup>
          <optgroup label="MM">
              <option value="10MM1">10MM1</option>
              <option value="10MM2">10MM2</option>
              <option value="10MM3">10MM3</option>
              <option value="11MM1">11MM1</option>
              <option value="11MM2">11MM2</option>
              <option value="11MM3">11MM3</option>
              <option value="12MM1">12MM1</option>
              <option value="12MM2">12MM2</option>
              <option value="12MM3">12MM3</option>
          </optgroup>
          <optgroup label="MM PLUS">
            <option value="10MM1PLUS">10MM1PLUS</option>
            <option value="10MM2PLUS">10MM2PLUS</option>
            <option value="11MM1PLUS">11MM1PLUS</option>
            <option value="11MM2PLUS">11MM2PLUS</option>
        </optgroup>
          <optgroup label="TKJ">
            <option value="10TKJ1">10TKJ1</option>
            <option value="10TKJ2">10TKJ2</option>
            <option value="10TKJ3">10TKJ3</option>
            <option value="11TKJ1">10TKJ1</option>
            <option value="11TKJ2">10TKJ2</option>
            <option value="11TKJ3">10TKJ3</option>
            <option value="12TKJ1">10TKJ1</option>
            <option value="12TKJ2">10TKJ2</option>
            <option value="12TKJ3">10TKJ3</option>
        </optgroup>
        <optgroup label="TKJ">
          <option value="10TKJ1PLUS">10TKJ1PLUS</option>
          <option value="10TKJ2PLUS">10TKJ2PLUS</option>
          <option value="11TKJ1PLUS">10TKJ1PLUS</option>
          <option value="11TKJ2PLUS">10TKJ2PLUS</option>
        </optgroup>
        <optgroup label="BDP">
          <option value="10BDP1">10TKJ1</option>
          <option value="10BDP2">10TKJ1</option>
          <option value="11BDP1">11BDP1</option>
          <option value="11BDP2">11BDP2</option>
          <option value="12BDP1">12BDP1</option>
          <option value="12BDP2">12BDP2</option>
      </optgroup>
      </select>
        @error('kode_kelas')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>Jenis kelamin</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenkel" id="laki-laki" value="laki-laki" {{ old('jenkel') == 'laki-laki' ? 'checked' : '' }}>
            <label class="form-check-label" for="laki-laki">Laki-laki</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenkel" id="perempuan" value="perempuan" {{ old('jenkel') == 'perempuan' ? 'checked' : '' }}>
            <label class="form-check-label" for="perempuan">Perempuan</label>
        </div>
        @error('jenkel')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
      <label for="no_tlp">Nomor Telepon:</label>
      <input type="tel" name="no_tlp" id="no_tlp" autocomplete="off" class="form-control @error('no_tlp') is-invalid @enderror" value="{{ old('no_tlp') }}">
      @error('no_tlp')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>
  <!-- Alamat -->
  <div class="form-group">
      <label for="alamat">Alamat:</label>
      <input type="text" name="alamat" id="alamat" autocomplete="off" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}">
      @error('alamat')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>
    <!-- Input fields for nomor telepon, alamat, and others -->
    <button type="submit" class="btn btn-primary bg-dark">Simpan</button>
</form>
<br><br>
<label for="">Import Data </label>
<form action="{{ route('importexcel') }}" method="POST" enctype="multipart/form-data">
  {{-- notifikasi form validasi --}}
  @if ($errors->has('file'))
  <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first('file') }}</strong>
  </span>
  @endif
  @csrf 
  <div class="input-group mb-3">
      <div class="custom-file">
          <input type="file" class="custom-file-input" id="file" name="file">
          <label class="custom-file-label" for="file">Choose file</label>
      </div>
      <div class="input-group-append">
          <button class="btn btn-primary" type="submit">Import</button>
      </div>
  </div>
</form>
{{-- <a class="btn btn-light" href="{{route('kelas')}}" role="button">kembali</a> --}}
{{-- <a class="btn btn-info" href="{{route('kelas')}}" role="button">Data sudah terinput</a> --}}
  </div>
  
@endsection