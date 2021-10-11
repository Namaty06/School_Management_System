@extends('layouts.main')
@section('content')
<div class="row ml-3">
    <h3 style="color: rgb(5, 5, 85)">Student Details</h3>

    <table class="table" style="color: black">
        <thead>
          <tr class="table-primary">
            <th scope="col">Code</th>
            <th scope="col">Full Name</th>
            <th scope="col">BirthDay</th>
            <th scope="col">Parent Phone</th>
            <th>Payment</th>
          </tr>

        </thead>
        <tbody class="table-default">
          <tr >
            <th scope="">{{ $student->code }}</th>
            <td>{{ $student->name }}</td>
            <td>{{ $student->age() }}</td>
            <td>{{ $student->parent_phone }}</td>
            <td><a class="btn btn-info" href="{{ route('student.payment',['id'=>$student->id]) }}"><i class="fas fa-money-check"></i></a></td>

          </tr>
        </tbody>
        <thead>
        <tr class="table-info">
            <th scope="col">Class Number</th>
            <th scope="col">Teacher</th>
            <th scope="col">Subject</th>
            <th scope="col">year</th>
          </tr>

        </thead>
        <tbody class="table-default">
           @foreach ($student->classroom as $class)
               <tr>
            <th scope="row">{{ $class->number }}</th>
            <td>{{ $class->teacher->name }}</td>
            <td>{{ $class->teacher->subject }}</td>
            <td>{{ $class->year }}</td>
          </tr>
           
           @endforeach
            
          
        </tbody>
        <thead>
          <tr class="table-warning">
              <th scope="col">Exam id</th>
              <th scope="col">Subject</th>
              <th scope="col">Type</th>
              <th scope="col">Mark</th>
            </tr>
  
          </thead>
          <tbody class="table-default">
             @foreach ($student->exam as $exam)
                 <tr>
              <th scope="row">{{ $exam->id }}</th>
              <td>{{ $exam->teacher->subject }}</td>
              <td>{{ $exam->type }}</td>              
              <td>{{ $exam->pivot->mark }}</td>
            </tr>
             
             @endforeach
              
            
          </tbody>

      </table>
</div>

@endsection