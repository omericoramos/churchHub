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

    public function search(Request $request)
    {
        $memberList =  $this->memberAction->search($request->member);
        return $memberList;
    }
    
    public function show()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update(Request $request,)
    {
        //
    }

    public function destroy()
    {
        //
    }
}
