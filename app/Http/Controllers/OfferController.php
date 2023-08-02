<?php

namespace App\Http\Controllers;

use App\Actions\Offer\OfferCategoryAction;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OfferController extends Controller
{
    public function __construct(
        protected OfferCategoryAction $offerCategoryAction = new OfferCategoryAction
    ) {
    }
    public function index()
    {
        //
    }

    public function create()
    {
        $offerCategory = $this->offerCategoryAction->list();
        return Inertia::render('Offer/Create', [
            'offerCategory' => $offerCategory
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
