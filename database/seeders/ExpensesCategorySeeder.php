<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpensesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExpenseCategory::insert(
            [
                ['type_category' =>'Conta Internet', 'recurring_expense' =>1],
                ['type_category' =>'Conta Luz', 'recurring_expense' => 1],
                ['type_category' =>'Conta Agua', 'recurring_expense' => 1],
                ['type_category' =>'Alugel', 'recurring_expense' => 1],
                ['type_category' => 'eventos', 'recurring_expense' => 0],
                ['type_category' =>'custo manutenção', 'recurring_expense' => 0],
                ['type_category' =>'Custo transporte', 'recurring_expense' => 0],
                ['type_category' =>'outros', 'recurring_expense' => 0]
            ]
        );
    }
}
