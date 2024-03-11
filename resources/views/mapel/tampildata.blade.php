@extends('layouts.admin')
@section('tampilmapel2')
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
          {{-- <th scope="col">Action</th> --}}
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
          </tr>
         
      </tbody>
      @endforeach
    </table>
    </div>

      <br><br>
    </div>
    
    </div>
    </div>
@endsection