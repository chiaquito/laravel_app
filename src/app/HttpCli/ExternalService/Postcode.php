<?php

namespace App\HttpCli\ExternalService;

use Illuminate\Support\Facades\Http;

use App\Usecases\Repositories\PostcodeRepositoryInterface;


class Postcode implements PostcodeRepositoryInterface
{
    public function fetchOne(int $postcode): object|null
    {
        // https://zipcloud.ibsnet.co.jp/doc/api
        $res = Http::get('zipcloud.ibsnet.co.jp/api/search',
            ['zipcode' => $postcode]
        );

        if ($res->failed()) {
            throw new \Exception("Failed to fetch postcode data: " . $res->body());
        }

        if (!isset($res->json()['results']) || empty($res->json()['results'])) {
            return null;
        }

        return (object) $res->json()['results'][0];
    }
}
