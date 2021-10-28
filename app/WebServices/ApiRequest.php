<?php

namespace App\WebServices;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ApiRequest
{
    /**
     * @var string
     */
    protected $baseUrl;

    public function __construct(string $baseUrl = '')
    {
        $this->baseUrl = $baseUrl;
    }

    public function get(string $url)
    {
        $response = Http::get($this->getUrl($url));
        return $response->collect();
    }

    public function getUrl($url)
    {
      if ($this->baseUrl) {
         return $this->buildBaseUrl() . $url;
      }

      return $url;
    }

    protected function buildBaseUrl()
    {
       if (Str::of($this->baseUrl)->endsWith('/')) {
           return $this->baseUrl;
       }
        return $this->baseUrl . '/';
    }
}
