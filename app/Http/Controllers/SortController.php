<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QsortService;
use App\Services\MsortService;

class SortController extends Controller
{
    public function qsort(Request $request, QsortService $quick_sort ){
        $arr = $request->arr ;
        $quick_sort ->sort($arr,0,count($arr)-1);
        dd($arr);

    }
    public function msort(Request $request, MsortService $merge_sort ){
        $arr = $request->arr ;
        $merge_sort ->sort($arr,0,count($arr)-1);
        dd($arr);
    }
}
