@extends('layouts.app')
@section('content')

    {!! $GlobalInfo->about_full_description ?? '' !!}

@endsection
@section('scripts')
    @parent

@endsection
