@extends('layouts.admin')

@section('tampilsiswa')
<div class="card mt-3">
    <div class="card-header bg-dark text-white">
        Baris data siswa
    </div>
    <br><br><br>
    <br>
    <div class="table-responsive">
        <table id="entries" class="table table-striped table-bordered">
          
            <thead class="table-dark">
                <tr>
                    <td scope="col">No</td>
                    <td scope="col">Nisn</td>
                    <td scope="col">Nama Siswa</td>
                    <td scope="col">Kelas</td>
                    <td scope="col">jenis Kelamin</td>
                    <td scope="col">Nomer Telepon Siswa</td>
                    <td scope="col">Alamat</td>
                    <td scope="col">Action</td>
                </tr>
            </thead>
            <tbody>
               
        @foreach ($siswa as $s)
    
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $s->nisn }}</td>
            <td>{{ $s->nama_siswa }}</td>
            <td>{{ $s->kode_kelas}}</td>
            <td>{{ $s->jenkel }}</td>
            <td>{{ $s->no_tlp }}</td>
            <td>{{ $s->alamat }}</td>
            <td>
                <form action="/siswa/hapus/{{ $s->id }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('editsiswa',$s->id ) }}" class="btn btn-success">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
            </tbody>
        </table>
    </div>
    <div class="">
        <a class="btn btn-primary bg-primary" href="{{ route('createsiswa') }}" role="button">Tambah</a>
    </div>
    <br><br>
</div>
@endsection