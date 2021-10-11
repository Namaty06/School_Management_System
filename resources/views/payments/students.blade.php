@extends('layouts.main')
@section('content') 
<h3 class="ml-3" style="color: rgb(5, 5, 85)">Students Payments</h3>
<div class="row ml-3">
   


  <nav class="navbar navbar-light bg-light">
  <form class="form-inline" method="POST" action="{{ route('student.search') }}">
    @csrf
    <input class="form-control mr-sm-2 @error('search') is-invalid @enderror" type="search" placeholder="Code :" name="search" >
   
    <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button> 
    @error('search')
     <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
     </span>
@enderror
  </form>
</nav>

    <table class="table" style="color: black">
        <thead>
          <tr class="table-primary">
            <th scope="col">Code</th>
            <th scope="col">Full Name</th>
            <th scope="col">Age</th>
            <th scope="col">Parent Phone</th>

          </tr>

        </thead>
        <tbody class="table-default">
            @foreach ($students as $student)
                          
          <tr >
            <th scope="">{{ $student->code }}</th>
            <td>{{ $student->name }}</td>
            <td>{{ $student->age() }}</td>
            <td>{{ $student->parent_phone }}</td>


          </tr>
         
        </tbody> 
      
        <thead>
          <tr class="table-success">
      
            <th scope="col"> Payment</th>        
            <th scope="col"> Amount</th>        
            <th scope="col">Next Payment</th>
            <th scope="col">Last Payment</th>

          </tr>

        </thead>
        <tbody class="table-default">
          @foreach ($student->payment as $payment)
              
         
          <tr>
            <td>#{{ $payment->id }}</td>
            <td>{{ $payment->amount}}</td>
            <td>{{ $payment->next_payment }}</td>
            <td>{{ $payment->last_payment }}</td>
          </tr>

           @endforeach
        </tbody>
        
 @endforeach
      </table>
</div>

@endsection