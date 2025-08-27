<link rel="stylesheet" href="https://31-Agency.com/MainSite/Requirements/CSS/bootstrap.min.css">
<style>
    .OTPVerfication {}

    .OTPVerficationInner {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #444444;
        overflow: hidden;
    }

    .OTPVerficationBG {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        opacity: 0.5;
        mix-blend-mode: luminosity;
    }

    .OTPVerficationDiv {
        display: block;
        margin: 0 auto;
        width: 400px;
        max-width: 80%;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 32px -7px #282828;
    }
</style>

<div class="OTPVerfication">
    <div class="OTPVerficationInner">
        @if($GlobalInfo->photo)
            <img src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $GlobalInfo->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $GlobalInfo->photo->getUrl('thumb')) }}" class="OTPVerficationBG">
        @else
            <img src="#" class="OTPVerficationBG">
        @endif
        <div class="OTPVerficationDiv">
            @if(session('message'))
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <div class="alert alert-warning" role="alert">{{ session('message') }}</div>
                    </div>
                </div>
            @endif
            @if($errors->count() > 0)
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route("otp.verification") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('otp') ? 'has-error' : '' }}">
                    <label for="otp"> A verification code was sent to your email, please enter the code here.</label>
                    <input type="text" id="otp" name="otp" class="form-control" style="text-align: center" placeholder="-  -  -  -  -  -" value="{{ old('otp') }}" required>
                    @if($errors->has('otp'))
                        <em class="invalid-feedback">
                            {{ $errors->first('otp') }}
                        </em>
                    @endif
                </div>

                <div>
                    <input class="btn btn-primary" type="submit" value="Verify My Account">
                </div>
            </form>
                <div>
                    <input class="btn btn-danger" onclick="$('#logoutform').submit();" type="button" value="Logout">
                    <form class="d-none" id="logoutform" action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                    </form>
                </div>
        </div>
    </div>
</div>

<script src="https://31-Agency.com/MainSite/Requirements/JS/jquery-3.6.0.min.js"></script>
<script src="https://31-Agency.com/MainSite/Requirements/JS/bootstrap.min.js" crossorigin="anonymous"></script>

