<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreFeedRequest;
use App\Models\Feed;
use Illuminate\Http\Request;

class FeedsController extends Controller
{
    public function store(StoreFeedRequest $request)
    {
        Feed::create($request->validated());

        return redirect()->route('home', ['#contact'])->with(['message' => 'Your message has been sent. Thank you!']);
    }

}
