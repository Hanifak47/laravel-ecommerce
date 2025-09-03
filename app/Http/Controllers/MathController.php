<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathController extends Controller
{
    //

    public function sum(int $first, int $second): int
    {
        $sum = $first + $second;
        return $sum;
    }


    public function substract($first, $second): float|int
    {

        if ($first < $second) {
            $sub = "first number should be higher than second one";
        } else {
            $sub = $first - $second;
        }
        return $sub;
    }
}
