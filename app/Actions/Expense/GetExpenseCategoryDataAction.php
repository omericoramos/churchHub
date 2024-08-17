<?php

declare(strict_types=1);

namespace App\Actions\Expense;

use App\Models\ExpenseCategory;

class GetExpenseCategoryDataAction
{
    public function list()
    {
        return ExpenseCategory::orderBy('type_category')->get()->toArray();
    }
}
