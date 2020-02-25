<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FindPrimeService;
use App\Services\LinklistService;

class TestController extends Controller
{
    public function find_prime(FindPrimeService $find_prime,$n){
        return $find_prime->find_nth($n);
    }

    public function list_crud(LinklistService $linklist){
        
        $linklist->insert_before(20,1);
        $linklist->insert_before(5,0);
        $linklist->insert_after(1,1);
        $linklist->insert_before(10,2); // at index
        $linklist->delete_value(20);
        dd($linklist);
        return $linklist;
    }
}