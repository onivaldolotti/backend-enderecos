# Laravel Backend Project For Addresses

This repository contains a Laravel project setup can manipulate address.

## Prerequisites

Before you begin, ensure you have met the following requirements:
- Laravel Sail: Make sure Laravel Sail is installed with your Laravel project.
- Docker: Make sure docker are installed in your machine
- Composer: To download the project dependencies

## Getting Started

1. Clone this repository to your local machine:

```shell
    git clone https://github.com/onivaldolotti/backend-enderecos.git
```

2. Navigate to the project directory:
```shell
    cd backend-enderecos
```

3. Install the project dependencies:
```shell
    composer install
```
4. Create a .env file based on .env.example and modify the variables as needed:
```shell
    cp .env.example .env
```
5. Build and start the Laravel Sail containers:
```shell
    ./vendor/bin/sail up -d
``` 
6. Access the Laravel application in your browser:
```
    http://localhost
```
## Endpoints
- Create Address
    - Endpoint: POST http://localhost/api/address
    - Content-Type: application/json
    - Body:
```json
    {
        "street": "rua 6",
        "district": "cidade 6",
        "uf": "SP",
        "city": "SP",
        "cep": "17000100"
    } 
``` 
- Get All Addresses
    - Endpoint: GET http://localhost/api/address
  
- Get Address by CEP
    - Endpoint: GET http://localhost/api/address/{cep}
    
- Update Address
    - Endpoint: PUT http://localhost/api/address/{id}
    - Content-Type: application/json
    - Body:
```json
    {
        "street": "rua 6",
        "district": "cidade 6",
        "uf": "SP",
        "city": "SP",
        "cep": "17000100"
    } 
``` 
-   Delete Address
    - Endpoint: DELETE http://localhost/api/address/{id}
