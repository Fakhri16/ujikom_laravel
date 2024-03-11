@extends('layouts.admin')

@section('updatesiswa')
<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Update Data Siswa
        </div>

        <div class="card-body">
            <form method="post" action="/siswa/update/{{ $siswa->id }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nisn">NISN:</label>
                    <input type="text" name="nisn" id="nisn" class="form-control" value="{{ $siswa->nisn }}" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa:</label>
                    <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="{{ $siswa->nama_siswa }}" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="kode_kelas">Kelas:</label>
                    <select class="custom-select" id="kode_kelas" name="kode_kelas">
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
                </div>

                <div class="form-group">
                    <label for="jenkel">Jenis Kelamin:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenkel" id="jenkel_laki" value="laki-laki" {{ $siswa->jenkel == 'laki-laki' ? 'checked' : '' }}>
                        <label class="form-check-label" for="jenkel_laki">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenkel" id="jenkel_perempuan" value="perempuan" {{ $siswa->jenkel == 'perempuan' ? 'checked' : '' }}>
                        <label class="form-check-label" for="jenkel_perempuan">Perempuan</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="no_tlp">Nomor Telepon:</label>
                    <input type="number" name="no_tlp" id="no_tlp" class="form-control" value="{{ $siswa->no_tlp }}">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $siswa->alamat }}">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
