@extends('index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Profile</h1></div>
                <div class="panel-body">
                    
                     <form method="POST" action="{{url('/profile') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="secondary_email_address" class="col-md-4 col-form-label text-md-right">{{ __('Secondary Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="secondary_email_address" 
                                type="secondary_email_address" 
                                class="form-control{{ $errors->has('secondary_email_address') ? 
                                ' is-invalid' : '' }}" name="secondary_email_address" required>

                                @if ($errors->has('secondary_email_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('secondary_email_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" 
                                type="phone_number" 
                                class="form-control{{ $errors->has('phone_number') ? 
                                ' is-invalid' : '' }}" name="phone_number" required>

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <input id="gender" 
                                type="gender" 
                                class="form-control{{ $errors->has('gender') ? 
                                ' is-invalid' : '' }}" name="gender" required>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Birthdate') }}</label>

                            <div class="col-md-6">
                                <input id="birthdate" 
                                type="birthdate" 
                                class="form-control{{ $errors->has('birthdate') ? 
                                ' is-invalid' : '' }}" name="birthdate" required>

                                @if ($errors->has('birthdate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="marital_status" class="col-md-4 col-form-label text-md-right">{{ __('Marital_Status') }}</label>

                            <div class="col-md-6">
                                <input id="marital_status" 
                                type="marital_status" 
                                class="form-control{{ $errors->has('marital_status') ? 
                                ' is-invalid' : '' }}" name="marital_status" required>

                                @if ($errors->has('marital_status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('marital_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Profile') }}
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