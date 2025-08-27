<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Destroy\MassDestroyFeedRequest;
use App\Http\Requests\Store\StoreFeedRequest;
use App\Models\Feed;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class FeedController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('feed_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feeds = Feed::all();

        return view('admin.feeds.index', compact('feeds'));
    }

    public function show(Feed $feed)
    {
        abort_if(Gate::denies('feed_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.feeds.show', compact('feed'));
    }

    public function destroy(Feed $feed)
    {
        abort_if(Gate::denies('feed_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feed->delete();

        return back();
    }

    public function massDestroy(MassDestroyFeedRequest $request)
    {
        Feed::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
