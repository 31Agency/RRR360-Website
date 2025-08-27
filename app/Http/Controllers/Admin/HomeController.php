<?php

namespace App\Http\Controllers\Admin;

use App\Check;
use App\Mail\WelcomeMail;
use App\Order;
use App\OrderType;
use App\Schedule;
use Illuminate\Support\Facades\Mail;

class HomeController
{
    public function index()
    {

        return view('admin.home');
    }

    public function send()
    {
        $dataAdmin = ([
            'name'=>"11",
            'email'=>"CL00",
            'reason'=> 55 ,
            'phone'=>"CL00",
        ]);

        Mail::to("alra3ealaa3@live.com")->send(new WelcomeMail($dataAdmin));

        dd('Notification sent!');
    }

}
