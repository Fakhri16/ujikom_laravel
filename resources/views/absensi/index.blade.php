@extends('layouts.admin')

@section('tampilabsensi')
<div class="card mt-3">
    <div class="card-header bg-dark text-white">
        Daftar Absensi 
    </div>
    <div class="card-body">
        <form action="{{ route('search') }}" method="GET" class="mb-3">
            <div class="form-group">
                <label for="siswakelas">Pencarian:</label>
                <div class="input-group">
                    <select class="custom-select" aria-label="Default select example" id="kode_kelas" name="kode_kelas">
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
                    
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </div>
        </form>
{{--         
        <a href="{{ route('export_excel2', ['kode_kelas' => $request->input('kode_kelas')]) }}" class="btn btn-primary">
            <i class="fas fa-download"></i> Export to sesuai data
        </a>
         --}}
        <div class="mb-4">
            <a href="{{ route('exporexcel') }}" class="btn btn-primary">
                <i class="fas fa-download"></i> Export semua data
            </a>
        </div>
        <div class="table-responsive">
            <table id="entries" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <td scope="col">No</td>
                        <td scope="col">Nama Siswa</td>
                        <td scope="col">Kelas</td>
                        <td scope="col">Guru yang melakukan absensi</td>
                        <td scope="col">Tanggal Melakukan Absensi</td>
                        <td scope="col">Status Absensi</td>
                        <td scope="col">Deskripsi</td>
                        <td scope="col">Action</td>
                    </tr>
                </thead>
                <tbody> 
                    @if ($presensi){
                        @foreach ($presensi as $a)
                            
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $a->siswa->nama_siswa }}</td>
                        <td>{{ $a->siswakelas }}</td>
                        <td>{{ $a->guru->nama_guru }}</td>
                        <td>{{ $a->tanggal }}</td>
                        <td>{{ $a->status }}</td>
                        <td>{{ $a->deskripsi }}</td>
                        <td>
                            <form action="/absensi/hapus/{{ $a->id }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="/absensi/edit/{{ $a->id }}" class="btn btn-success">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                        @endforeach
                    }
                        
                    @else

                    @foreach ($absensi as $a)  
                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $a->nama_siswa }}</td>
                        <td>{{ $a->kode_kelas }}</td>
                        <td>{{ $a->nama_guru }}</td>
                        <td>{{ $a->tanggal }}</td>
                        <td>{{ $a->status }}</td>
                        <td>{{ $a->deskripsi }}</td>
                        <td>
                            <form action="/absensi/hapus/{{ $a->id }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="/absensi/edit/{{ $a->id }}" class="btn btn-success">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{-- <div class="">
            <a class="btn btn-primary bg-primary" href="{{ route('absensi') }}" role="button">Tambah</a>
        </div> --}}
        <br><br>
    </div>
</div>
@endsection