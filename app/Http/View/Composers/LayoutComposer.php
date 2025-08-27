<?php

namespace App\Http\View\Composers;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Info;
use App\Models\Link;
use App\Models\Social;
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
        $info       = Info::first();
        $socials    = Social::all();
        $feed_links = Link::all();
        $categories = Category::all();

        $view->with('GlobalInfo', $info);
        $view->with('GlobalSocials', $socials);
        $view->with('GlobalFeedLinks', $feed_links);
        $view->with('GlobalCategories', $categories);
    }
}
