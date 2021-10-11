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
                    <form method="POST" action="{{ route('Exam.store') }}">
                        @csrf                 
                       
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="teacher_id">teacher</label>
                            <div class="col-md-6 inputGroupContainer">
                                 <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-file-code-o"></i></span>
                                      <select class="form-control" id="teacher_id" name="teacher_id">
                                        
                                        @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }} (<span class="badge bg-secondary">{{ $teacher->subject }}</span>)</option>
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
                        <label class="col-md-4 col-form-label text-md-right" for="type">Type</label>
                        <div class="col-md-6 inputGroupContainer">
                             <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-file-code-o"></i></span>
                                  <select class="form-control" id="type" name="type">
                                    <option value="CC1">CC1</option>
                                    <option value="CC2">CC2</option>
                                    <option value="CFA">CFA</option>
                                  </select>
                                 
                             </div> 
                             @error('type')
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
