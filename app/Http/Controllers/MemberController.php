<?php

namespace App\Http\Controllers;

use App\Actions\Member\MemberAction;
use App\Helpers\CustomMessages;
use App\Http\Requests\MemberRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MemberController extends Controller
{

    public function __construct(
        protected MemberAction $memberAction = new MemberAction
    ) {
    }

    public function index()
    {
        //
    }

    public function create()
    {
        return Inertia::render('Member/Create');
    }

    public function store(MemberRequest $memberRequest)
    {
        $response = $this->memberAction->store($memberRequest->all());
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
