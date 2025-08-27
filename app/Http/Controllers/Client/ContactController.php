<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Counter;
use App\Models\property;
use App\Models\Quote;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {

        return view('client.contact');
    }

}
