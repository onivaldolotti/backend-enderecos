<?php

namespace App\Services;

use App\Models\Address;
use App\Services\AddressCreationService;
use App\Services\Cep\CepServiceInterface;

class AddressManagementService
{
    protected $cepService;

    public function __construct(CepServiceInterface $cepService)
    {
        $this->cepService = $cepService;
    }

    public function getAddressOrCreate($cep)
    {
        $numericCep = (int)$cep;
        $address = Address::where('cep', $numericCep)->first();
        
        if (!$address) {
            $apiData = $this->cepService->getAddressByCep($cep);

            if ($this->validateApiData($apiData)) {
                $newAddressData = [
                    'street' => $apiData['logradouro'],
                    'district' => $apiData['bairro'],
                    'uf' => $apiData['uf'],
                    'city' => $apiData['localidade'],
                    'cep' => (int)str_replace("-", "", $apiData['cep']),
                ];

                $address = Address::create($newAddressData);
            }
        }

        return $address;
    }

    private function validateApiData($apiData)
    {
        return (
            isset($apiData['logradouro']) &&
            isset($apiData['bairro']) &&
            isset($apiData['uf']) &&
            isset($apiData['localidade']) &&
            isset($apiData['cep'])
        );
    }
}
