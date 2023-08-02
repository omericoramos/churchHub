<?php

use Carbon\Carbon;

// retorna true se a data2 for maior que a data1
function compareDates(string $date1, string $date2)
{
    $date1 = Carbon::createFromFormat('Y-m-d', $date1);
    $date2 = Carbon::createFromFormat('Y-m-d', $date2);
    $result  = $date1->lte($date2);
    return $result;
}

function differenceBetweenDates(string $initialDate, string $finalDate)
{
    $date1 = Carbon::createFromFormat('Y-m-d', $initialDate);
    $date2 = Carbon::createFromFormat('Y-m-d', $finalDate);
    $value = $date2->diff($date1);
    return $value;
}

// pega os quatro ultimos anos para o filtro na folha considerando o ano atual
function getLastYears(int $amount)
{
    $currentyear = date('Y');

    for ($i = 0; $i < $amount; $i++) {
        $years[] = intval($currentyear) - $i;
    }
    return $years;
}

if (!function_exists('formatDateDefault')) {
    function formatDateDefault(string $data)
    {
        $data = implode('-', array_reverse(explode('/', $data)));
        return $data;
    }
}
if (!function_exists('formatDateBrazil')) {
    function formatDateBrazil(string $data)
    {
        $data = implode('/', array_reverse(explode('-', $data)));
        return $data;
    }
}


function defafultFormt(string $data)
{
    $data = implode('-', array_reverse(explode('/', $data)));
    return $data;
}

// retorna o mes por extenso
function monthName(string $month)
{
    $explode = explode('-', $month);
    $explode[2] != '20' ? $monthValue = $explode[1] : $monthValue = '13';

    $monthName = [
        '01' =>   'jan.',
        '02' => 'fev.',
        '03' => 'mar.',
        '04' =>  'abr.',
        '05' => 'maio',
        '06' => 'jun.',
        '07' => 'jul.',
        '08' => 'ago.',
        '09' => 'set.',
        '10' => 'out.',
        '11'  => 'nov.',
        '12'  => 'dez.',
        '13' => '13° sal.'
    ];

    return "{$monthName[$monthValue]}{$explode[0]}";
}
