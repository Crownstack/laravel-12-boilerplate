<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Main\Subscriber;

class SubscribeRepository extends BaseRepository
{

    public function submitSubscribeForm($data)
    {
        Subscriber::create($data);
        return $this->returnResponse();
    }
}