
@extends('layouts.customize-auth')

@section('content')
    <form action="{{ route('2fa.verify') }}" method="POST">

        <input type="text" name="one_time_password" required>
        <button type="submit">Verify</button>
    </form>

    <div class="OTPScreen">
        <div class="OTPScreenInner">
            <img src="https://wallpapers.com/images/hd/cyber-security-padlock-connecting-82vcugsqh34jkhr4.jpg" class="OTPScreenBG">
            <form class="OTPScreenDiv" action="{{ route('2fa.verify') }}" method="POST">
                @if ($errors->any())
                    <p style="color: red;">{{ $errors->first() }}</p>
                @endif
                @csrf
                    <div id="QR">
                        {!! $QRImage !!}
                    </div>
                <h4>Enable two-factor authentication (2FA) using the Google Authenticator app or any app that supports two-factor authentication</h4>
                    <p>Or you can enter the key manually in the app:</p>
                    <strong>{{ auth()->user()->google2fa_secret }}</strong>
                <input type="text" placeholder="-  -  -  -" name="one_time_password" required>
                <div class="OTPScreenDivBtns">
                    <button type="submit">
                        <i class="fa fa-lock-open"></i>
                        Verify Access
                    </button>

                    <button type="button" onclick="$('#LogOutForm').submit()">
                        <i class="fa fa-sign-out-alt"></i>
                        Sign Out
                    </button>
                </div>
            </form>
        </div>

        <form id="LogOutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://unpkg.com/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
        <script src="{{ asset("") }}FrontCP/assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="{{ asset("") }}FrontCP/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset("") }}FrontCP/assets/vendor/chart.js/chart.min.js"></script>
        <script src="{{ asset("") }}FrontCP/assets/vendor/echarts/echarts.min.js"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

        <script type="text/javascript" src="../tableExport.js"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset("") }}FrontCP/assets/js/main.js"></script>

        <script src="{{ asset('js/main.js') }}"></script>
    </div>
@endsection
