<?php

declare(strict_types=1);

namespace App\Actions\Offer;

use App\Models\Offer;

class StoreOfferAction
{
    public function store(array $data)
    {
        try {
            Offer::create($data);
            return sucessResponse('Oferta cadastrada com sucesso!');
        } catch (\Throwable $th) {
          return errorResponse('Erro ao cadastrar a offerta');
        }
    }
}
