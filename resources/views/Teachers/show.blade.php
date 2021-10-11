@extends('layouts.main')
@section('content')
<div class="row ml-3">
    <h3 style="color: rgb(5, 5, 85)">Teacher Details</h3>

    <table class="table" style="color: black">
        <thead>
          <tr class="table-primary">
            <th scope="col">CIN</th>
            <th scope="col">Full Name</th>
            <th scope="col">Age</th>
            <th scope="col"> Phone</th>
            <th scope="col"> Classroom</th>
            <th scope="col"> Grade</th>        
            <th scope="col"> Salarie</th>        
            <th scope="col">Payment</th>
          </tr>

        </thead>
        <tbody class="table-default">
          <tr >
            <th scope="">{{ $teacher->cin }}</th>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->age() }}</td>
            <td>{{ $teacher->phone }}</td>
            <td>{{ $teacher->classroom->number }}</td>
            <td>{{ $teacher->classroom->grade->level }} {{ $teacher->classroom->grade->grade }}</td>
            <td>{{ $teacher->salarie }}</td>

            <td><a class="btn btn-info" href="{{ route('teacher.payment',['id'=>$teacher->id]) }}"><i class="fas fa-money-check"></i></a></td>

          </tr>
        </tbody>
      
        <thead>
          <tr class="table-primary">
            <th scope="col">Exam id</th>
            <th scope="col">Type</th>
            <th scope="col">created</th>

          </tr>

        </thead>
        <tbody class="table-default">
          @foreach ($teacher->exam as $exam)
       
          <tr>
            <th scope="">{{ $exam->id }}</th>
            <td>{{ $exam->type }}</td>
            <td>{{ $exam->created_at->diffForHumans() }}</td>      
          </tr> 

          @endforeach
        </tbody>
        

      </table>
</div>

@endsection