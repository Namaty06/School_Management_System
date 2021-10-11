@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (\Session::has('msg'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('msg') !!}</li>
                    </ul>
                </div>
            @endif
          
                <div style="color:black" class="card-header">New Class</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('student.class') }}">
                        @csrf                      
                                            
                       <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="classroom_id">classroom</label>
                        <div class="col-md-6 inputGroupContainer">
                             <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-file-code-o"></i></span>
                                  <select class="form-control" id="classroom_id" name="classroom_id">
                                    
                                    @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}">{{ $classroom->number }}</option>
                                        @endforeach
                                  </select>
                                 
                             </div> 
                             @error('classroom_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                   </div>
                   
                       
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="student_id">student</label>
                            <div class="col-md-6 inputGroupContainer">
                                 <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-file-code-o"></i></span>
                                      <select class="form-control" id="student_id" name="student_id">
                                        
                                        @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                      </select>
                                     
                                 </div> 
                                 @error('student_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>
                       </div>
                        
                      
                        
                  
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
