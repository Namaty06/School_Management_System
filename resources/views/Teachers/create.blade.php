@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="color:black" class="card-header">New Teacher</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Teacher.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cin" class="col-md-4 col-form-label text-md-right">CIN</label>

                            <div class="col-md-6">
                                <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror" name="cin" value="{{ old('cin') }}" required autocomplete="cin" autofocus>

                                @error('cin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="bithday" class="col-md-4 col-form-label text-md-right">BirthDate</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday">

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="type">Subject</label>
                            <div class="col-md-6 inputGroupContainer">
                                 <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-file-code-o"></i></span>
                                      <select class="form-control" id="type" name="subject">
                                        
                                         <option value="Maths">Maths</option>
                                         <option value="Physics&Chemistry">Physics&Chemistry</option>   
                                         <option value="Algebra">Algebra</option>                                     
                                         <option value="History&Geography">History&Geography</option>
                                         <option value="Biology">Biology</option>
                                         <option value="Physical Education">Physical Education</option>
                                         <option value="French">French</option>
                                      </select>
                                     
                                 </div> 
                                 @error('Subject')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>
                       </div>
                        <div class="form-group row">
                            <label for="salarie" class="col-md-4 col-form-label text-md-right">Salarie</label>

                            <div class="col-md-6">
                                <input id="salarie" type="text" class="form-control @error('salarie') is-invalid @enderror" name="salarie" value="{{ old('salarie') }}" required autocomplete="salarie">

                                @error('salarie')
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
