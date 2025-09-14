<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use App\Models\Info;
use App\Models\Link;
use App\Models\Social;
use App\Models\Visitor;
use Illuminate\View\View;

class LayoutComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $info              = Info::first();
        $socials           = Social::all();
        $feed_links        = Link::all();
        $categories        = Category::whereHas('properties')->get();
        $check_old_visitor = Visitor::where('ip', $_SERVER['REMOTE_ADDR'])->exists();

        $view->with('GlobalInfo', $info);
        $view->with('GlobalSocials', $socials);
        $view->with('GlobalFeedLinks', $feed_links);
        $view->with('GlobalCategories', $categories);
        $view->with('CheckOldVisitor', $check_old_visitor);
    }
}
