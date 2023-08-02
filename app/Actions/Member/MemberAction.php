<?php

declare(strict_types=1);

namespace App\Actions\Member;

use App\Helpers\CustomDate;
use App\Helpers\CustomMessages;
use App\Models\Member;

class MemberAction
{
    public function store(array $memberData)
    {
        $memberData['birth_date'] = defafultFormt($memberData['birthDate']);
        $memberData['affiliation_date'] = defafultFormt($memberData['affiliationDate']);
        unset($memberData['birthDate'], $memberData['affiliationDate']);

        $member = Member::where('name', $memberData['name'])
            ->where('birth_date', $memberData['birth_date'])->first();
            
        if ($member == null) {
            try {
                Member::create($memberData);
                return sucessResponse('Dados cadastrados com sucesso');
            } catch (\Throwable $th) {
                return errorResponse('Erro ao cadastrar o novo membro');
            }
        }
        errorResponse('Este membro já esta cadastrado');
    }

    public function ListMembers()
    {
        $listMembers = Member::orderBy('name')->paginate(7);
        return $listMembers;
    }

    public function search(string $search)
    {
        $listMembers = Member::where('name', 'like', "%{$search}%")->paginate(7);
        return $listMembers;
    }

    public function getMember(int $id)
    {
        $member = Member::where('id', $id)->first(['id', 'name', 'email', 'phone', 'birth_date', 'affiliation_date']);
        return $member;
    }
}
