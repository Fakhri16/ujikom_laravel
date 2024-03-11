@extends('layouts.admin')

@section('tampilkelas')
<div class="card mt-3">
    <div class="card-header bg-dark text-white">
        Baris data Kelas
    </div>
    <br>
    <div class="table-responsive">
        <table id="entries" class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <td scope="col">No</td>
                    <td scope="col">Kelas</td>
                    <td scope="col">Jurusan</td>
                    <td scope="col">Nama Wali Kelas</td>
                    <td scope="col">Tipe Kelas</td>
                    <td scope="col">Action</td>
                </tr>
            </thead>
            <tbody>
               
        @foreach ($kelas as $k)
      
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $k->tingkat }}</td>
            <td>{{ $k->jurusan ?? 'jurusan' }}</td>
            <td>{{ $k->nama_guru ?? 'nama_guru' }}</td>
            <td>{{$k->tipe }}</td>
            <td>
                <form action="/kelas/hapus/{{ $k->id }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/kelas/edit/{{ $k->id }}" class="btn btn-success">Edit</a>
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
        <a class="btn btn-primary bg-primary" href="{{ route('createkelas') }}" role="button">Tambah</a>
    </div>
    <br><br>
</div>
@endsection