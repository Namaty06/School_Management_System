@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (\Session::has('msg'))
                <div class="alert alert-danger">
                    <ul>
                        <li>vous ne pouver pas payer plus que 9 mois il vous reste que {!! \Session::get('msg') !!} mois non payer</li>
                    </ul>
                </div>
            @endif
                <div style="color:black" class="card-header">New Teacher Payment</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('confirm.payment',['id'=>$teacher->id]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="months" class="col-md-4 col-form-label text-md-right">Months</label>

                            <div class="col-md-6">
                                <input id="months" type="number" max="9" class="form-control @error('months') is-invalid @enderror" name="months" value="{{ old('months') }}" required autocomplete="months" autofocus>

                                @error('months')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">Salarie </label>
                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ $teacher->salarie }}" required autocomplete="amount" autofocus readonly>

                                @error('amount')
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
