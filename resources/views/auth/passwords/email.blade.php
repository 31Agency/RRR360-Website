@extends('layouts.client')
@section('content')
    <div class="LoginScreen">
        <div class="container-fluid h-100">
            <div class="row justify-content-center align-items-center align-content-center h-100">
                <div class="col-lg-10 col-md-10">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="LoginDiv">
                                <form class="LoginDivInner" method="POST" action="{{ route('password.email') }}">
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
                                    <h3 class="LoginDivInnerHeader">Recover Password</h3>
                                    <div class="LoginDivInnerRow">
                                        <div class="LoginDivInnerHolder">
                                            <g>
                                                <i class="fas fa-envelope"></i>
                                            </g>
                                            <input type="email" name="email" placeholder="Email Address" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" required value="{{ old('email', null) }}">
                                        </div>
                                    </div>
                                    <button type="submit">
                                        Send Recovery Mail
                                    </button>
                                    <h12>
                                        Return to login screen ?
                                        <a href="{{route("login")}}">Login</a>
                                    </h12>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
