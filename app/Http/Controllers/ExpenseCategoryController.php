<?php

namespace App\Http\Controllers;

use App\Actions\Expense\GetExpenseCategoryDataAction;
use App\Actions\Expense\StoreExpenseCategoryAction;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{

    public function index(GetExpenseCategoryDataAction $getExpenseCategoryDataAction)
    {
        $expenseCategory = $getExpenseCategoryDataAction->list();
        return json_encode($expenseCategory);
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

    public function store(StoreExpenseCategoryAction $storeExpenseCategoryAction, Request $request)
    {
        $response = $storeExpenseCategoryAction->store($request->all());
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
