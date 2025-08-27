<?php

namespace App\Http\View\Composers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class CheckVerificationComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1" && Auth::check() && Auth::user()->email_verified_at == null)
        {
            redirect(route('otp.generate'))->send();
        }
    }
}
