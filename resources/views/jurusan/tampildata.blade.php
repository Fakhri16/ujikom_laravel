@extends('layouts.admin')
@section('tampiljurusan2')
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