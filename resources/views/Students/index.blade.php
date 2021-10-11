@extends('layouts.main')
@section('content')
    


<div class="row ml-3">
    <h3 style="color: rgb(5, 5, 85)">List of Students</h3>
<table class="table  table-striped">
    
    <thead>
      <tr class="table-info">
        <th scope="col">Code</th>
        <th scope="col">Full Name</th>
        <th scope="col">Age</th>
        <th scope="col">Grade</th>
        <th scope="col">Parent Phone</th>        
        <th scope="col">Details</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody style="color:black">
        
        @foreach ($students as $student)
            
      <tr>
        <th scope="row">{{ $student->code }}</th>
        <td>{{ $student->name }}</td>
        <td>{{ $student->age() }}</td>
        <td>{{ $student->grade->level }} {{ $student->grade->grade }}</td>
        <td>{{ $student->parent_phone }}</td>
        <td>
         <a class="btn btn-sm btn-primary" href="{{ route('Student.show',['Student'=>$student->id]) }}"> <i class="fas fa-eye"></i> </a>
        </td>
        
        <td><a class="btn btn-sm btn-success" href="{{ route('Student.edit',['Student'=>$student->id]) }}"><i class="fas fa-edit"></i></a></td>
        <td>
            <form method="post" action="{{ route('Student.destroy',['Student'=>$student->id])}}" >
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