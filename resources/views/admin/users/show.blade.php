@extends('layouts.customize-admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.phone') }}
                        </th>
                        <td>
                            {{ $user->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Roles
                        </th>
                        <td>
                            @foreach($user->roles as $id => $roles)
                                <span class="label label-info label-many">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Enable two-factor authentication (2FA)
                        </th>
                        <td>
                            <p>Scan the following QR code using the Google Authenticator app or any app that supports two-factor authentication:</p>

                            <div>
                                {!! $QRImage !!}
                            </div>

                            <p>Or you can enter the key manually in the app:</p>
                            <strong>{{ $user->google2fa_secret }}</strong>

                            <form action="{{ route('2fa.verify') }}" method="POST">
                                @csrf
                                <label>Enter the code you received:</label>
                                <input type="text" name="one_time_password" required>
                                <button class="btn btn-xs btn-success" type="submit">Verify</button>
                            </form>

                            <hr>
                            <a class="btn btn-xs btn-primary" href="{{ route('enable-2fa', [$user->two_fa_token]) }}">تفعيل 2FA</a>

                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection
