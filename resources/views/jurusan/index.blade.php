@extends('layouts.admin')
@section('tampiljurusan')
<div class="card mt-3">
    <div class="card-header bg-dark text-white">
    Baris data Jurusan
    </div>
    <br><br><br>
    <br>
    
    <div class="table-responsive">
    <table id="entries" class="table table-striped table-bordered ">
      <thead class="table-dark">
        <tr>
          <th scope="col" >No</th>
          <th scope="col">Nama Jurusan</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      @foreach ($jurusan as $j )
      <tbody>
          <tr>
           
            <td>
                {{ $loop->iteration}}
            </td>
            <td>
              {{ $j->jurusan }}
            </td>
            <td>
              
              <form action="/jurusan/hapus/{{$j->id}}" method="post">
                @csrf
                @method('delete')
                <div class="btn-group" role="group" aria-label="Basic example">
                <a href="/jurusan/edit/{{$j->id}}"  class="btn btn-success">Edit</a>
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
      <a class="btn btn-primary bg-primary" href="{{route('createjurusan')}}" role="button">Tambah</a>
      </div>
      <br><br>
    </div>
    
    </div>
    </div>
@endsection