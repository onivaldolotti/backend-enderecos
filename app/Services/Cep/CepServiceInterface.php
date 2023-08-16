<?php

namespace App\Services\Cep;

interface CepServiceInterface
{
    public function getAddressByCep($cep);
}
