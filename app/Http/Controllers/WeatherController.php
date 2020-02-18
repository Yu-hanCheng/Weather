<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Weather;
use Illuminate\Support\Facades\Cookie;
class WeatherController extends Controller
{

    public function index(Request $request){
        
        $datas = array();
        for($i=5;$i>0;$i--){
            if ($request->cookie($i)) {
                array_push($datas,json_decode($request->cookie($i)));
            }
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
            $response = $client->request('GET', 'api.openweathermap.org/data/2.5/weather?q='.$request->location.'&appid=bd45fc9db8849cb46d00a451483ccd44');
        } catch (\Throwable $th) {
            return redirect('exception');
        }
        $response = json_decode($response->getBody());
        
        $weather = Weather::create([
            'location'=>$response->name,
            'temp'=>$response->main->temp,
            'weather'=>json_encode($response->weather),
        ]);
        
        $the_ptr=$request->cookie('ptr');
        if($the_ptr==null){
            $ptr_cookie = Cookie::make('ptr',strval(1));
            $the_ptr=1;
        }
        if($the_ptr==6){
            $ptr_cookie = Cookie::make('ptr',strval(1) );
            for($i=1;$i<5;$i++){
                ${"c".$i}=Cookie::make($i, $request->cookie($i+1));
            }
            $c5 = Cookie::make(5, $weather);
            return redirect('/')->withCookie($c1)->withCookie($c2)->withCookie($c3)->withCookie($c4)->withCookie($c5);
        }else{
            $cookie = Cookie::make($the_ptr, $weather);
            $ptr_cookie = Cookie::make('ptr', strval($the_ptr+1));
        }
        return redirect('/')->withCookie($ptr_cookie)->withCookie($cookie);
        
    }
  
}
