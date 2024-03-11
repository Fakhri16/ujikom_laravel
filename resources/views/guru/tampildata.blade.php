@extends('layouts.admin')
@section('tampilguru2')
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
        </tr>
      </thead>
      
      <tbody>
        
        @foreach ($guru as $g)
      
        <tr>
            <td scope="row" >{{ $loop->iteration }}</td>
            <td>{{ $g->nama_guru }}</td>
            <td>{{ $g->nama_mapel ?? 'nama_mapel' }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    </div>

      <br><br>
    </div>
    
    </div>
    </div>
@endsection