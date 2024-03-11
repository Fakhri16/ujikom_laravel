@extends('layouts.admin')
@section('tampilguru')
<div class="card mt-3">
    <div class="card-header bg-dark text-white">
    Baris data guru
    </div>
    <br><br><br>
    <br>
    <div class="table-responsive">
    <table id="entries" class="table table-striped tabl e-bordered ">
      <thead class="table-dark">
        <tr>
          <td scope="col">No</td>
          <td scope="col">Nama guru</td>
          <td scope="col">Mapel pelajaran</td>
          <td scope="col">Action</td>
        </tr>
      </thead>
      
      <tbody>
        
        @foreach ($guru as $g)
      
        <tr>
            <td scope="row" >{{ $loop->iteration }}</td>
            <td>{{ $g->nama_guru }}</td>
            <td>{{ $g->nama_mapel ?? 'nama_mapel' }}</td>
            <td>
                <form action="/guru/hapus/{{ $g->id }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="/guru/edit/{{ $g->id }}" class="btn btn-success">Edit</a>
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
      <a class="btn btn-primary bg-primary" href="{{route('createguru')}}" role="button">Tambah</a>
      </div>
      <br><br>
    </div>
    
    </div>
    </div>
@endsection