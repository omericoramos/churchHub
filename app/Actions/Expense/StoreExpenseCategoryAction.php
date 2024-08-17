<?php

declare(strict_types=1);

namespace App\Actions\Expense;

use App\Models\ExpenseCategory;

class StoreExpenseCategoryAction
{
    public function store(array $storeData)
    {
        ExpenseCategory::firstOrcreate(
            ['type_category' =>  $storeData['categoryStore']],
            ['type_offer' => $storeData['categoryStore'], 'recurring_expense' => $storeData['recurringExpense']]
        );
        return sucessResponse('Categoria cadastrada com sucesso!');

        return errorResponse('Erro ao cadastrar a categoria');
    }
}
