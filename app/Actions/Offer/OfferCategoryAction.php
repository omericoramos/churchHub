<?php

declare(strict_types=1);

namespace App\Actions\Offer;

use App\Models\OfferCategory;

class OfferCategoryAction
{

    public function list()
    {
        $offerCategory = OfferCategory::all();
        return $offerCategory;
    }
}
