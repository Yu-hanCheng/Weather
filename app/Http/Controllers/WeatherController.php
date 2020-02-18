<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Weather;
class WeatherController extends Controller
{
    
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
            return response()->json(['result'=>"The city is not exist!!"],404);
        }
        $response = json_decode($response->getBody());
        
        $weather = Weather::create([
            'location'=>$response->name,
            'temp'=>$response->main->temp,
            'weather'=>json_encode($response->weather),
        ]);
        
        
        return response()->json(['result'=>$weather],200);
        
    }

}
