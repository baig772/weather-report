<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Interfaces\API\V1\UsersInterface;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __invoke($id, UsersInterface $interface)
    {
        try {
            return $this->makeSuccessResponse('', $interface->getDetailedWeather($id));
        } catch (\Exception $exception) {
            return $this->makeFailureResponse($exception->getMessage(), [], $exception->getCode());
        }
    }
}
