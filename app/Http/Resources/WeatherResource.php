<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "latitude" => (float) $this['latitude'] ?? null,
            "longitude" => (float) $this['longitude'] ?? null,
            "resolvedAddress" => $this['resolvedAddress'] ?? null,
            "address" => $this['address'] ?? null,
            "timezone" => $this['timezone'] ?? null,
            "days" => [
                "datetime" => $this["days"][0]['datetime'] ?? null,
                "tempmax" => $this["days"][0]['tempmax'] ?? null,
                "tempmin" => $this["days"][0]['tempmin'] ?? null,
                "temp" => $this["days"][0]['temp'] ?? null,
                "conditions" => $this["days"][0]['conditions'] ?? null,
                "description" => $this["days"][0]['description'] ?? null,
            ],
            "meta" => [
                "source" => "Visual Crossing Weather API",
                "request_time" => now(),
            ]
        ];
    }
}
