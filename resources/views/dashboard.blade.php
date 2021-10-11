@extends('layouts.main')
@section('content')
    
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Earnings </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">${{ $earnings }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Fees </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">${{ $fees }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Employees
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Students</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $count }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

<div class="row ml-3">
    <h3 style="color: rgb(5, 5, 85)">Teachers NOT payed</h3>
<table class="table  table-striped">
    
    <thead>
      <tr class="table-danger" style="color:black">
        <th scope="col">CIN</th>
        <th scope="col">Full Name</th>
        <th scope="col">Age</th>
        <th scope="col"> Salarie</th>       
       <th scope="col"> Period Not payed</th>
       <th scope="col"> show</th>

      </tr>
    </thead>
    <tbody style="color:black">
    
    @foreach ($teachers as $teacher)

        <tr>
        <th scope="">{{ $teacher->cin }}</th>
        <td>{{ $teacher->name }}</td>
        <td>{{ $teacher->age() }}</td>
        <td>{{ $teacher->salarie }}</td>
        <td style="color:rgb(187, 0, 0)">{{ \Carbon\Carbon::parse( $t)->diffInDays($teacher->next_payment) }}d</td>
        <td><a class="btn btn-sm btn-primary" href="{{ route('Teacher.show',['Teacher'=>$teacher->paymentable_id]) }}"><i class="fas fa-eye"></i></a></td>

        </tr>

    @endforeach

    </tbody>
  </table>


  <h3 style="color: rgb(5, 5, 85)">Students Not payed</h3>
  <table class="table  table-striped">
    
    <thead>
      <tr class="table-danger" style="color:black">
        <th scope="col">Code</th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Parent Phone</th>
      </tr>
    </thead>
    <tbody style="color:black">
        @foreach ($students as $student)
            
        <tr>
          <th scope="row">{{ $student->code }}</th>
          <td>{{ $student->name }}</td>
          <td>{{ $student->age() }}</td>
          <td>{{ $student->parent_phone }}</td>
          <td style="color:rgb(187, 0, 0)">{{ \Carbon\Carbon::parse( $t)->diffInDays($student->next_payment)  }}d</td>
          <td><a class="btn btn-sm btn-primary" href="{{ route('Student.show',['Student'=>$student->paymentable_id]) }}"><i class="fas fa-eye"></i></a></td>
  
          <td>
        
     @endforeach
     
    </tbody>
  </table>
 


</div>
@endsection
