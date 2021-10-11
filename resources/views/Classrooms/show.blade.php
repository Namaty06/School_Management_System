@extends('layouts.main')
@section('content')
<div class="row ml-3">
    <h3 style="color: rgb(5, 5, 85)">Student Details</h3>

    <table class="table" style="color: black">
        <thead>
          <tr class="table-primary">
            <th scope="col">Number</th>
            <th scope="col">Teacher</th>
            <th scope="col">subject</th>
            <th scope="col">grade</th>
            <th scope="col">Year</th>
          </tr>

        </thead>
        <tbody class="table-default">
          <tr >
            <th scope="">{{ $classroom->number }}</th>
            <td>{{ $classroom->teacher->name }}</td>
            <td>{{ $classroom->teacher->subject }}</td>
            <td>{{ $classroom->grade->level }} {{ $classroom->grade->grade }} </td>
            <td>{{ $classroom->year }}</td>
          </tr>
        </tbody>
        <thead>
        <tr class="table-info">
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Parent Phone</th>
          </tr>

        </thead>
        <tbody class="table-default">
           @foreach ($classroom->student as $student)
               <tr>
            <th scope="row">{{ $student->code }}</th>
            <td>{{ $student->name }}</td>
            <td>{{ $student->age() }}</td>
            <td>{{ $student->parent_phone }}</td>
          </tr>
           
           @endforeach
            
          
        </tbody>
        
      </table>
</div>

@endsection