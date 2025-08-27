<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Client;
use App\Models\Counter;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\property;
use App\Models\Quote;
use App\Models\Reel;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $sliders    = Slider::all();
        $categories = Category::whereHas('properties')->get();
        $properties = Property::search($request)->orderBy('id', 'DESC')->take(6)->get();
        $faqs       = Faq::all();
        $galleries  = Gallery::orderBy('id', 'DESC')->get();

        return view('client.home', compact('sliders', 'categories', 'properties', 'faqs', 'galleries'));
    }

}
