@extends('layouts.main')
@section('content')
 <h3 style="color: rgb(5, 5, 85);">Students Payments</h3>
<div class="row ml-3 ">
 
<nav class="navbar navbar-light bg-light">
  <form class="form-inline" method="POST" action="{{ route('teacher.search') }}">
    @csrf
    <input class="form-control mr-sm-2 @error('search') is-invalid @enderror" type="search" placeholder="Cin :" name="search" >
   
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
            <th scope="col">CIN</th>
            <th scope="col">Full Name</th>
            <th scope="col">Age</th>
            <th scope="col"> Salarie</th>

          </tr>

        </thead>
        <tbody class="table-default">
           @foreach ($teachers as $teacher)
            <tr >
            <th scope="">{{ $teacher->cin }}</th>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->age() }}</td>
            <td>{{ $teacher->salarie }}</td>

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
          @foreach ($teacher->payment as $payment)
              
         
          <tr>
            <td>{{ $payment->id }}</td>
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