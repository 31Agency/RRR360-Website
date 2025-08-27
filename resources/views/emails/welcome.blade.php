<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;background-color:#f9f9f9" id="bodyTable">
    <tbody>
    <tr>
        <td style="padding-right:10px;padding-left:10px;" align="center" valign="top" id="bodyCell">
            {{--                        Header--}}
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperWebview" style="max-width:600px;margin: 39px auto;">
                <tbody>
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>

                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            {{--                        Button--}}
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperBody" style="max-width:600px">
                <tbody>
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableCard" style="background-color:#fff;border-color:#e5e5e5;border-style:solid;border-width:0 1px 1px 1px;">
                            <tbody>
                            <tr>
                                <td style="background-color:#fcb71a;font-size:1px;line-height:3px" class="topBorder" height="3">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding-top: 60px; padding-bottom: 20px;" align="center" valign="middle" class="emailLogo">
                                    <a href="#" style="text-decoration:none" target="_blank">
                                        @if($GlobalInfo->photo)
                                            <img alt="" border="0" src="{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $GlobalInfo->photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $GlobalInfo->photo->getUrl('thumb')) }}" style="width:100%;max-width:150px;height:auto;display:block" width="150">
                                        @else
                                            <img alt="" border="0" src="#" style="width:100%;max-width:150px;height:auto;display:block" width="150">
                                        @endif
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 5px; padding-left: 20px; padding-right: 20px;" align="center" valign="top" class="mainTitle">
                                    <h2 class="text" style="color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:28px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:center;padding:0;margin:0">One Last Step 👆</h2>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 30px; padding-left: 20px; padding-right: 20px;" align="center" valign="top" class="subTitle">
                                    <h4 class="text" style="color:#999;font-family:Poppins,Helvetica,Arial,sans-serif;font-size:16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:24px;text-transform:none;text-align:center;padding:0;margin:0">Verify Your Email Account - {{ Auth::user()->email ?? '' }}</h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:20px;padding-right:20px" align="center" valign="top" class="containtTable ui-sortable">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableDescription" style="">
                                        <tbody>
                                        <tr>
                                            <td style="padding-bottom: 20px;" align="center" valign="top" class="description">
                                                <p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;text-align:center;padding:0;margin:0">Thanks for joining <u style="color: #f69607;text-decoration: none!important;">Al-RCC</u> family. Please copy the code down below and paste it in the application to verify your account. </p>
                                                <h4 style="margin: 21px auto 0;width: 70%;color: #c8183e;word-break: break-all;font-weight: 600;"> {!! $data['otp'] !!} </h4>
                                                <p> {{$data['expire_at']}} </p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableButton" style="display: none!important">
                                        <tbody>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:1px;line-height:1px" height="20">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="space">
                            <tbody>
                            <tr>
                                <td style="font-size:1px;line-height:1px" height="30">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            {{--                        Footer--}}
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperFooter" style="max-width:600px">
                <tbody>
                <tr>
                    <td align="center" valign="top" style="display: none!important;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="footer">
                            <tbody>

                            <tr>
                                <td style="padding: 10px 10px 5px;" align="center" valign="top" class="brandInfo">
                                    <p class="text" style="color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0">©&nbsp;IT Department . | 31 Agency 2023 | Amman Dabouq, Jordan.</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 10px 20px;" align="center" valign="top" class="footerLinks">
                                    <p class="text" style="color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0"> <a href="https://31-Agency.com/" style="color:#bbb;text-decoration:underline" target="_blank"> Our Website </a>&nbsp;|&nbsp; <a href="https://31-Agency.com" style="color:#bbb;text-decoration:underline" target="_blank"> Contact Info </a>&nbsp;|&nbsp; <a href="https://31-Agency.com" style="color:#bbb;text-decoration:underline" target="_blank">Privacy Policy</a>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="display: block;letter-spacing: 10px" align="center" valign="top" class="appLinks">
                                    <a href="#Play-Store-Link" style="display: inline-block" target="_blank" class="play-store">
                                        <img alt="" border="0" src="http://email.aumfusion.com/vespro/img/app/play-store.png" style="display: block;margin-left: 3px;margin-right: 3px;height:auto;width:100%;max-width:120px;padding: 10px" width="120">
                                    </a>
                                    <a href="#App-Store-Link" style="display: inline-block;" target="_blank" class="app-store">
                                        <img alt="" border="0" src="http://email.aumfusion.com/vespro/img/app/app-store.png" style="display: block;margin-left: 3px;margin-right: 3px;height:auto;width:100%;max-width:120px;padding: 10px" width="120">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:1px;line-height:1px" height="30">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="font-size:1px;line-height:1px" height="30">&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
