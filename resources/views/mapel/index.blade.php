@extends('layouts.admin')
@section('tampilmapel')
<div class="card mt-3">
    <div class="card-header bg-dark text-white">
    Baris data mapel
    </div>
    <br><br><br>
    <br>
    
    <div class="table-responsive">
    <table id="entries" class="table table-striped table-bordered ">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Mapel</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      @foreach ($mapel as $m )
      <tbody>
          <tr>
            <td>
                {{ $loop->iteration}}
              </td>
            <td>
              {{ $m->nama_mapel }}
            </td>
            <td>
              
              <form action="/mapel/hapus/{{$m->id}}" method="post">
                @csrf
                @method('delete')
                <div class="btn-group" role="group" aria-label="Basic example">
                <a href="/mapel/edit/{{$m->id}}"  class="btn btn-success">Edit</a>
                <button type="submit" class="btn btn-danger">Delete</button>
                </div>
              </form>
            </td>
          </tr>
         
      </tbody>
      @endforeach
    </table>
    </div>
    <div class="">
      <a class="btn btn-primary bg-primary" href="{{route('createmapel')}}" role="button">Tambah</a>
      
      </div>
      <br><br>
    </div>
    
    </div>
    </div>
@endsection