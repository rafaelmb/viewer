<?php

namespace App\Services;

use App\Models\Url;
use Carbon\Carbon;
use Goutte\Client;

class FetchUrlData
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function updateUrl(Url $url): Url
    {
        $crawler = $this->client->request('GET', $url->url);
        $url->response = $crawler->html();
        $url->status_code = $this->client->getInternalResponse()->getStatusCode();
        $url->last_update = Carbon::now();
        $url->save();

        return $url;
    }

}