<?php

declare(strict_types=1);

namespace App\Actions\Offer;

use Illuminate\Support\Str;

class OfferAction
{
    public function store(array $data, StoreOfferAction $storeOfferAction)
    {
        $date = implode('-', array_reverse(explode('/', $data['date'])));
        $value = Str::replaceFirst(',', '.', $data['value']);

        $offerData = [
            'value' => floatval($value),
            'date' => $date,
            'member_id' => $data['memberId'],
            'offer_category_id' => intval($data['categoryOffer'])
        ];
        $response = $storeOfferAction->store($offerData);
        return $response;
    }
}
