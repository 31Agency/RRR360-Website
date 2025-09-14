@extends('layouts.app')
@section('content')
    <section class="AboutPage">
        <div class="container">
            <div class="AboutPageCover">
                <video src="{{ $GlobalInfo->about_video->url ?? '' }}" playsinline controls></video>
            </div>

            <div class="AboutPageDiv">
                {!! $GlobalInfo->about_full_description ?? '' !!}
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    @parent

@endsection
