<?php

declare(strict_types=1);

namespace App\Actions\Offer;

use App\Models\OfferCategory;

class OfferCategoryAction
{
    public function list()
    {
        $offerCategory = OfferCategory::all(['id', 'type_offer']);
        return $offerCategory;
    }

    public function store(string $categoryName)
    {
        try {
            OfferCategory::firstOrcreate(
                ['type_offer' =>  $categoryName],
                ['type_offer' =>  $categoryName]
            );
            return sucessResponse('Categoria cadastrada com sucesso!');
        } catch (\Throwable $th) {
           return errorResponse('Erro ao cadastrar a categoria');
        }
    }
}
