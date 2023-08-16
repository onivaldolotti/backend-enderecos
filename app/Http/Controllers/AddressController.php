<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use App\Services\AddressCreationService;
use App\Services\Cep\CepServiceInterface;
use App\Services\AddressManagementService;

class AddressController extends Controller
{

    protected $addressManagementService;

    public function __construct(AddressManagementService $addressManagementService)
    {
        $this->addressManagementService = $addressManagementService;
    }

    public function index()
    {
        $addresses = Address::all();

        return response()->json($addresses);
    }

    public function store(AddressRequest $request)
    {
        $validatedData = $request->validated();

        $existingAddress = Address::where('cep', $validatedData['cep'])->first();

        if ($existingAddress) {
            return response()->json(['message' => 'Cep cadastrado anteriormente'], 400);
        }

        $address = Address::create($validatedData);

        return response()->json($address, 201);
    }

    public function update(Request $request, string $id)
    {
        $address = Address::find($id);

        if(!$address) {
            return response()->json(['message' => 'Endereço não encontrado'], 404);
        }

        $fields = collect($request->all())->only([
            'street',
            'district',
            'uf',
            'city',
            'cep',
        ]);

        $address->update($fields->toArray());

        return response()->json($address);
    }

    public function destroy(string $id)
    {
        $address = Address::find($id);

        if(!$address) {
            return response()->json(['message' => 'Endereço não encontrado'], 404);
        }

        $address->delete();

        return response('', 204);
    }

    public function findByCep(string $cep)
    {
        
        $address = $this->addressManagementService->getAddressOrCreate($cep);

        if (!$address) {
            return response()->json(['message' => 'Endereço não encontrado'], 404);
        }

        return response()->json($address);

    }
}
