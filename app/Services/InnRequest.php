<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\InnResponseDTO;
use Carbon\Carbon;
use Config;
use Illuminate\Support\Facades\Http;

class InnRequest implements InnRequestInterface
{
    public function get(string $inn): InnResponseDTO
    {
        $response = $this->request($inn);

        if (isset($response['status']) && $response['status'] === 'success') {
            return new InnResponseDTO([
                'status' => 'success',
                'message' => $response['message']
            ]);
        }

        return new InnResponseDTO([
            'status' => 'error',
            'message' => $response['message']
        ]);
    }

    private function request(string $inn): array
    {
        return Http::post(Config::get('services.inn.url'), [
            'inn' => $inn,
            'requestDate' => Carbon::now()->format('Y-m-d')
        ])
            ->json();
    }
}
