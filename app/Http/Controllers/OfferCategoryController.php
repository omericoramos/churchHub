<?php

namespace App\Http\Controllers;

use App\Actions\Offer\OfferCategoryAction;
use App\Http\Requests\StoreCategoryOfferRequest;
use App\Models\OfferCategory;
use Illuminate\Http\Request;

class OfferCategoryController extends Controller
{
    public function index(OfferCategoryAction $offerCategoryAction)
    {
        $offerCategory = $offerCategoryAction->list();
        return $offerCategory;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(StoreCategoryOfferRequest $request, OfferCategoryAction $offerCategoryAction)
    {
        $response = $offerCategoryAction->store($request->categoryStore);
        return $response;
    }

    public function show(OfferCategory $offerCategory)
    {
        //
    }

    public function edit(OfferCategory $offerCategory)
    {
        //
    }

    public function update(Request $request, OfferCategory $offerCategory)
    {
        //
    }

    public function destroy(OfferCategory $offerCategory)
    {
        //
    }
}
