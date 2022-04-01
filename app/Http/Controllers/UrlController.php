<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUrlRequest;
use App\Http\Requests\UrlRefreshRequest;
use App\Jobs\ProcessUrl;
use App\Models\Url;
use App\Services\FetchUrlData;

class UrlController extends Controller
{

    public function create(CreateUrlRequest $request)
    {
        if ($url = Url::firstOrCreate($request->only(['url']))) {
            ProcessUrl::dispatch($url);
            return back()->with('status', __('Url Created Successfully!'));
        }
    }

    public function showBody($id)
    {
        return view('body')->with('url', Url::findOrFail($id));
    }

    public function refresh(UrlRefreshRequest $request, FetchUrlData $fetchUrlData)
    {
        $url = Url::find($request->input('id'));

        return $fetchUrlData->updateUrl($url);
    }
}
