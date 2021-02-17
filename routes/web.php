<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $irisCaptcha=new \IrisDev\iriscaptchalaravel\iriscaptchalaravel;
          if($request->has("irisCaptcha")) {
            $res = $irisCaptcha->Check_Answer($request->irisCaptcha,$request->ip(),false);
            //var_dump($request->get["irisCaptcha"]);die();
            if ($res->is_valid) {
                // Captcha verified - continue ...
                return "HOOOORAAAA";
            }else{
                return $res->error;
            }

                
        }else{
        
        $html='
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test Iris Captcha</title>
        </head>
        <body style="padding:100px;">
        <form Method="get" action="/" >
        <input type="hidden" name="_token" value="' . csrf_token() . '">
        <input name="Username" required type="text" placeholder="Username" />
        <input name="Password" required type="passowrd" placeholder="Password" />
        <button type="submit">Submit | Click Me!</button>
        <iris-captcha name="irisCaptcha" />
        </form>
        </body>
        </html>';
        echo $html;
        echo $irisCaptcha->Get_Js();
        } 
        
        
});