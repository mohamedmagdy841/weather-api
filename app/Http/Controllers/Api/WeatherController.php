<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\WeatherResource;
use App\Http\Traits\ApiResponse;
use App\Services\WeatherService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    use ApiResponse;
    protected $weatherService;

    public function __construct(WeatherService $_weatherService)
    {
        $this->weatherService = $_weatherService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $validated = $request->validate([
                'city' => 'required|string|max:255'
            ]);

            $city = $validated['city'];

            $weatherData = $this->weatherService->getWeather($city);
            $message = $weatherData['message'] ?? 'Weather data retrieved successfully.';

            return $this->sendResponse(new WeatherResource($weatherData['data'] ?? []), $message);

        } catch (\Exception $e) {
            return $this->sendResponse([], 'An error occurred while retrieving weather data.' . $e->getMessage(), 422);
        }
    }

    // Show form for city
    public function showForm()
    {
        return view('weather');
    }

    // Handle form submission and display weather results
    public function getWeatherResult(Request $request)
    {
        $validated = $request->validate([
            'city' => 'required|string|max:255',
        ]);

        $weatherData = $this->weatherService->getWeather($validated['city']);

        return view('weather-results', get_defined_vars());
    }
}
