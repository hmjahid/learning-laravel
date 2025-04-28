<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class exerciseController extends Controller
{
    //
    public function sum (float $num1, float $num2) {
        return $num1 + $num2;
    }

    public function subtract (float $num1, float $num2) {
        return $num1 - $num2;
    }

    
}
