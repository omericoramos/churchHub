<?php

namespace App\Http\Controllers;

use App\Actions\Member\MemberAction;
use App\Actions\Tithe\TitheAction;
use App\Http\Requests\TitheRequest;
use App\Models\Tithe;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TitheController extends Controller
{
    public function __construct(
        protected MemberAction $memberAction = new MemberAction,
        protected TitheAction $titheAction = new TitheAction
    ) {
    }

    public function memberList(Request $request)
    {
        $request->search ? $listMembers = $this->memberAction->search($request->search)
            : $listMembers = $this->memberAction->ListMembers();
        return Inertia::render('Tithe/ListMembers', ['members' => $listMembers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $member = $this->memberAction->getMember($request->memberId);
        return Inertia::render(
            'Tithe/Create',
            ['member' => $member]
        );
    }

    public function store(TitheRequest $titheRequest)
    {
        $response = $this->titheAction->store($titheRequest->all());
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tithe  $tithe
     * @return \Illuminate\Http\Response
     */
    public function show(Tithe $tithe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tithe  $tithe
     * @return \Illuminate\Http\Response
     */
    public function edit(Tithe $tithe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tithe  $tithe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tithe $tithe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tithe  $tithe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tithe $tithe)
    {
        //
    }
}
