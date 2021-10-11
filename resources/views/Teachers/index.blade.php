@extends('layouts.main')
@section('content')
    


<div class="row ml-3">
    <h3 style="color: rgb(5, 5, 85)">List of Teachers</h3>
<table class="table  table-striped">
    
    <thead>
      <tr class="table-info">
        <th scope="col">CIN</th>
        <th scope="col">Full Name</th>
        <th scope="col">BirthDay</th>
        <th scope="col">Phone</th>
        <th scope="col">Subject</th>
        <th scope="col">Salarie</th>
        <th scope="col">date of joining</th>
        <th> Show </th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody style="color:black">
        
        @foreach ($teachers as $teacher)
            
      <tr>
        <th scope="row">{{ $teacher->cin }}</th>
        <td>{{ $teacher->name }}</td>
        <td>{{ $teacher->birthday }}</td>
        <td>{{ $teacher->phone }}</td>
        <td>{{ $teacher->subject }}</td>
        <td>{{ $teacher->salarie }}</td>
        <td>{{ $teacher->created_at->format('d/m/Y') }}</td>
        <td><a class="btn btn-sm btn-primary" href="{{ route('Teacher.show',['Teacher'=>$teacher->id]) }}"><i class="fas fa-eye"></i></a></td>
        <td><a class="btn btn-sm btn-success" href="{{ route('Teacher.edit',['Teacher'=>$teacher->id]) }}"><i class="fas fa-edit"></i></a></td>
        <td>
            <form method="post" action="{{ route('Teacher.destroy',['Teacher'=>$teacher->id])}}" >
            @csrf
            @method('DELETE') 
            <button type="submit" class="btn btn-sm btn-danger" ><i class="fas fa-trash"></i></button>
        </form>
        
        </td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
 
</div>
@endsection