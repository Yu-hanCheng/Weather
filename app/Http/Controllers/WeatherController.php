<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Weather;
use Illuminate\Support\Facades\Cookie;
class WeatherController extends Controller
{
    
    public function index(Request $request){
        $datas_origin =json_decode( $request->cookie('history'),true);
        if ($datas_origin) {
            $datas=array_reverse($datas_origin);
        }else{
            $datas=array();
        }
        return view('welcome', compact('datas'));
    }
    public function exception_error(){
        $cod='404';
        $msg="The city is not exist!!";
        return view('exception', compact('cod','msg'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $client = new Client();
        try {
            $response = $client->request('GET', env('WEATHER_API_URL').$request->location.'&appid='.env('APP_ID'));
        } catch (\Throwable $th) {
            return redirect('exception');
        }
        $response = json_decode($response->getBody());
        $weather = Weather::create([
            'location'=>$response->name,
            'temp'=>$response->main->temp,
            'weather'=>($response->weather)[0]->description,
        ]);
        
        
        $history_arr=$request->cookie('history');
        
        $decode=array();
        if (!$history_arr) {
            $history_arr=array();
        }else{
            $decode=json_decode($history_arr,true);
            if (count($decode)==env('LIST_COUNT')) {
                array_shift($decode);
            }
        }
        array_push($decode,$weather);
        $cookie = Cookie::make('history', json_encode($decode));
        
        return redirect('/')->withCookie($cookie);
        
    }
  
}
