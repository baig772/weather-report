<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserWeather;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command imports the weather data for the users in DB based on their coordinates';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $users = User::all();
        foreach ($users as $user) {

            UserWeather::where('user_id', $user->id)->delete();

            $url = config('custom.weather_api_url') . '?key=' . config('custom.weather_api_key') .
                '&q=' . $user->latitude . ',' . $user->longitude;


            $result = Http::get($url);
            $decodedResponse = json_decode($result->body(), true);

            if (!empty($decodedResponse['location']) && !empty($decodedResponse['current'])) {
                $this->saveWeatherData($user->id, $decodedResponse);
            }


        }
    }

    private function saveWeatherData($userId, $data)
    {
        $userWeather = new UserWeather();

        $userWeather->name = $data['location']['name'];
        $userWeather->cloud = $data['current']['cloud'];
        $userWeather->user_id = $userId;
        $userWeather->country = $data['location']['country'];
        $userWeather->wind_mph = $data['current']['wind_mph'];
        $userWeather->wind_kph = $data['current']['wind_kph'];
        $userWeather->humidity = $data['current']['humidity'];
        $userWeather->feelslike_celsius = $data['current']['feelslike_c'];
        $userWeather->temperature_celsius = $data['current']['temp_c'];
        $userWeather->feelslike_fahrenheit = $data['current']['feelslike_f'];
        $userWeather->temperature_fahrenheit = $data['current']['temp_f'];

        $userWeather->save();
    }

}
