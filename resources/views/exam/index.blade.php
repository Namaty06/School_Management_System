@extends('layouts.main')
@section('content')
    


<div class="row ml-3">
    <h3 style="color: rgb(5, 5, 85)">List of Teachers</h3>
<table class="table  table-striped">
    
    <thead>
      <tr class="table-info">
        <th scope="col">Id</th>
        <th scope="col">Teacher</th>
        <th scope="col">subject</th>
        <th scope="col">Type</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody style="color:black">
        
        @foreach ($exams as $exam)
            
      <tr>
        <th scope="row">{{ $exam->id }}</th>
        <td>{{ $exam->teacher->name }}</td>
        <td>{{ $exam->teacher->subject }}</td>       
        <td>{{ $exam->type}}</td>
        <td><a class="btn btn-sm btn-success" href="{{ route('Exam.edit',['Exam'=>$exam->id]) }}"><i class="fas fa-edit"></i></a></td>
        <td>
            <form method="post" action="{{ route('Exam.destroy',['Exam'=>$exam->id])}}" >
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