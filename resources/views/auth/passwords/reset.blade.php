@extends('layouts.client')
@section('content')
    <div class="LoginScreen">
        <div class="container-fluid h-100">
            <div class="row justify-content-center align-items-center align-content-center h-100">
                <div class="col-lg-10 col-md-10">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="LoginDiv">
                                <form class="LoginDivInner" method="POST" action="{{ route('password.request') }}">
                                    {{ csrf_field() }}
                                    @if(\Session::has('message'))
                                        <error class="animate__animated animate__zoomIn">
                                            <i class="fa fa-exclamation-circle"></i>
                                            {{ \Session::get('message') }}
                                        </error>
                                    @endif
                                    @if($errors->has('email'))
                                        <error class="animate__animated animate__zoomIn">
                                            <i class="fa fa-exclamation-circle"></i>
                                            {{ $errors->first('email') }}
                                        </error>
                                    @endif
                                    <h3 class="LoginDivInnerHeader">{{ trans('panel.site_title') }}</h3>
                                    <div class="LoginDivInnerRow">
                                        <div class="LoginDivInnerHolder">
                                            <g>
                                                <i class="fas fa-envelope"></i>
                                            </g>
                                            <input type="email" name="email" placeholder="{{ trans('global.login_email') }}" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" required value="{{ old('email', null) }}">
                                            @if($errors->has('email'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('email') }}
                                                </em>
                                            @endif
                                        </div>
                                        <div class="LoginDivInnerRow">
                                            <div class="LoginDivInnerHolder" id="PasswordHolder">
                                                <g>
                                                    <i class="fas fa-key"></i>
                                                </g>
                                                <input type="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required>
                                                <buttin type="button" class="ShowPassBtn" onclick="ShowPassword($(this))"
                                                        status="Hidden">
                                                    <i class="fas fa-eye"></i>
                                                </buttin>
                                            </div>
                                        </div>
                                        <div class="LoginDivInnerRow">
                                            <div class="LoginDivInnerHolder" id="ConfirmPasswordHolder">
                                                <g>
                                                    <i class="fas fa-key"></i>
                                                </g>
                                                <input type="password" placeholder="Confirm Password" class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                                                <buttin type="button" class="ShowPassBtn" onclick="ShowPassword($(this))"
                                                        status="Hidden">
                                                    <i class="fas fa-eye"></i>
                                                </buttin>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit">
                                        {{ trans('global.reset_password') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
