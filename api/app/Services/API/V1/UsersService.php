<?php

namespace App\Services\API\V1;

use App\Interfaces\API\V1\UsersInterface;
use App\Models\UserWeather;

class UsersService implements UsersInterface
{
    public function getDetailedWeather($userId)
    {
        return UserWeather::where('user_id', $userId)->first();
    }
}
