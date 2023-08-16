<?php

namespace App\Services\Cep;

use Illuminate\Support\Facades\Http;

class ViaCepService implements CepServiceInterface
{
    public function getAddressByCep($cep)
    {
        $apiResponse = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($apiResponse->ok()) {
            return $apiResponse->json();
        }

        return null;
    }
}


