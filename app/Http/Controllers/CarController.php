<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    //
    public function index()
    {
        return "ini adalah kontroller index";
    }

    public function my_car()
    {
        return "mobilku";
    }
}
