<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QsortService;

class SortController extends Controller
{
    public function qsort(QsortService $quick_sort){
        $arr = array(3,9,7,1,4,6,5,2);//
        $quick_sort ->sort($arr,0,count($arr)-1);
        dd($arr);

    }
}
