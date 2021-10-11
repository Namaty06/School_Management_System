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
                <div style="color:black" class="card-header">New Exam</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('Result.store') }}">
                        @csrf                 
                       
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="student_id">student</label>
                            <div class="col-md-6 inputGroupContainer">
                                 <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-file-code-o"></i></span>
                                      <select class="form-control" id="student_id" name="student_id">
                                        
                                        @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }} (<span class="badge bg-secondary">{{ $student->code }}</span>)</option>
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
                       <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="exam_id">Exam</label>
                        <div class="col-md-6 inputGroupContainer">
                             <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-file-code-o"></i></span>
                                  <select class="form-control" id="exam_id" name="exam_id">
                                    
                                    @foreach ($exams as $exam)
                                    <option value="{{ $exam->id }}">{{ $exam->teacher->subject }} (<span class="badge bg-secondary">{{ $exam->type }}</span>)</option>
                                @endforeach
                                  </select>
                                 
                             </div> 
                             @error('exam_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                   </div>
                     
                   <div class="form-group row">
                    <label for="mark" class="col-md-4 col-form-label text-md-right">Mark</label>

                    <div class="col-md-6">
                        <input id="mark" type="text" class="form-control @error('mark') is-invalid @enderror" name="mark" value="{{ old('mark') }}" required autocomplete="mark" autofocus>

                        @error('mark')
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
