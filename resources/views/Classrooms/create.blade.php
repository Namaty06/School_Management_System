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
                    <form method="POST" action="{{ route('Classroom.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">Class Number</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus>

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                                            
                       <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="teacher_id">Teacher</label>
                        <div class="col-md-6 inputGroupContainer">
                             <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-file-code-o"></i></span>
                                  <select class="form-control" id="teacher_id" name="teacher_id">
                                    
                                    @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                  </select>
                                 
                             </div> 
                             @error('teacher_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                   </div>
                   
                       
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="grade_id">Grade</label>
                            <div class="col-md-6 inputGroupContainer">
                                 <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-file-code-o"></i></span>
                                      <select class="form-control" id="grade_id" name="grade_id">
                                        
                                        @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->level }} <span>{{ $grade->grade }}</span></option>
                                    @endforeach
                                      </select>
                                     
                                 </div> 
                                 @error('grade_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>
                       </div>
                        
                       <div class="form-group row">
                        <label for="year" class="col-md-4 col-form-label text-md-right">Year</label>

                        <div class="col-md-6">
                            <input id="year" type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}" required autocomplete="year" autofocus>

                            @error('year')
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
