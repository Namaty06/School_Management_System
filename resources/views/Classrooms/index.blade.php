@extends('layouts.main')
@section('content')
    


<div class="row ml-3">
    <h3 style="color: rgb(5, 5, 85)">List of Classrooms</h3>
<table class="table  table-striped">
    
    <thead>
      <tr class="table-info">
        <th scope="col">Number</th>
        <th scope="col">Teacher</th>
        <th scope="col">Grade</th>
        <th scope="col">Year</th>
        <th scope="col">Created</th>
        <th scope="col">Details</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody style="color:black">
        
        @foreach ($classrooms as $classroom)
            
      <tr>
        <th scope="row">{{ $classroom->number }}</th>
        <td>{{ $classroom->teacher->name }}</td>
        <td>{{ $classroom->grade->level }}{{ $classroom->grade->grade }}</td>
        <td>{{ $classroom->year }}</td>       
        <td>{{ $classroom->created_at->format('d/m/Y') }}</td>
        <td>
          <a class="btn btn-sm btn-primary" href="{{ route('Classroom.show',['Classroom'=> $classroom->id]) }}"> <i class="fas fa-eye"></i> </a>
         </td>
        <td><a class="btn btn-sm btn-success" href="{{ route('Classroom.edit',['Classroom'=>$classroom->id]) }}"><i class="fas fa-edit"></i></a></td>
        <td>
            <form method="post" action="{{ route('Classroom.destroy',['Classroom'=>$classroom->id])}}" >
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