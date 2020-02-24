<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FindPrimeService;

class TestController extends Controller
{
    public function find_prime(FindPrimeService $find_prime,$n){
        return $find_prime->find_nth($n);
    }
}