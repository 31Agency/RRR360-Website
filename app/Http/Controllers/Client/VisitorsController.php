<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorsController extends Controller
{
    public function store(Request $request)
    {
        $check_old_visitor = Visitor::where('ip', $request->ip())->exists();

        if (!$check_old_visitor)
        {
            Visitor::create([
                'ip' => $request->ip(),
            ]);
        }

        return response()->json('success');
    }

}
