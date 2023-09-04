<?php

namespace App\Http\Controllers;

use App\Actions\Offer\OfferAction;
use App\Actions\Offer\OfferCategoryAction;
use App\Actions\Offer\StoreOfferAction;
use App\Http\Requests\StoreOfferRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OfferController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return Inertia::render('Offer/Create');
    }

    public function store(StoreOfferRequest $request, OfferAction $offerAction)
    {
        $response  = $offerAction->store($request->all(), new StoreOfferAction);
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
