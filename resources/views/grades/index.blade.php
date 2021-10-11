@extends('layouts.main')
@section('content')
    


<div class="row ml-3">
    <h3 style="color: rgb(5, 5, 85)">List of Teachers</h3>
<table class="table  table-striped">
    
    <thead>
      <tr class="table-info">
        <th scope="col">Id</th>
        <th scope="col">Level</th>
        <th scope="col">Grade</th>
        <th>Monthly Amount</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody style="color:black">
        
        @foreach ($grades as $grade)
            
      <tr>
        <th scope="row">{{ $grade->id }}</th>
        <td>{{ $grade->level }}</td>
        <td>{{ $grade->grade }}</td>
        <td>{{ $grade->monthly_amount }}</td>

        <td><a class="btn btn-sm btn-success" href="{{ route('Grade.edit',['Grade'=>$grade->id]) }}"><i class="fas fa-edit"></i></a></td>
        <td>
            <form method="post" action="{{route('Grade.destroy',['Grade'=>$grade->id])}}" >
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