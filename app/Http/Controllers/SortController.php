<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QsortService;

class SortController extends Controller
{
    public function qsort(Request $request, QsortService $quick_sort ){
        $arr = $request->arr ;
        $quick_sort ->sort($arr,0,count($arr)-1);
        dd($arr);

    }
}
