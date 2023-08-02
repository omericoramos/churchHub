<?php

declare(strict_types=1);

namespace App\Actions\Tithe;

use App\Helpers\CustomDate;
use App\Models\Member;

class TitheAction
{
    public function store(array $titheData)
    {
        $titheData['date'] = formatDateDefault($titheData['date']);
        $titheData['value'] = formatCurrent($titheData['value']);
        $member = Member::find($titheData['memberId']);
        
        try {
            $member = Member::find($titheData['memberId']);
            $member->tithe()->create(
                [
                    'value' => $titheData['value'],
                    'date' => $titheData['date'],
                    'member_id' => $titheData['memberId']
                ]
            );
            return  sucessResponse('Dizimo cadastrado com sucesso!');
        } catch (\Throwable $th) {
            return errorResponse('Erro ao cadastrar o dizimo');
        }
    }
}
