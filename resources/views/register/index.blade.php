@extends('layouts.admin')
@section('indexregister')
<div class="card mt-3">
    <div class="card-header bg-dark text-white">
        Baris data user yang login
    </div>
    <br><br><br>
    <br>
    <div class="table-responsive">
        <table id="entries" class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Guru</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($users as $user)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $user->name }}</td>
    <td>
        {{ $user->email }} <!-- Closed the curly braces -->
    </td>
    <td>
        @foreach ($user->roles as $role) <!-- Changed variable name $r to $role -->
            {{ $role->nama_role }} <!-- Corrected syntax to access role name -->
        @endforeach 
    </td>
    
        {{-- <form action="/register/delete/{{ $user->id }}" method="post"> <!-- Corrected closing parenthesis -->
            @csrf
            @method('DELETE')
            <a href="/register/delete/{{ $user->id }}" class="btn btn-success">Edit</a>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form> --}}
    
</tr>
@endforeach
            </tbody>
        </table>
    </div>
    <br><br>
</div>
@endsection
