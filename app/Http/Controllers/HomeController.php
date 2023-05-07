<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
// use GuzzleHttp\Client;
class HomeController extends Controller
{
    //
    public function sendTelegramMessage(Request $request){
        $ch = curl_init();
        $this->validate($request,[
           
            'message'=> 'required'
        ]);
        $senderMessage = $request->get('message');
        // remove whitespacing 
        $senderMessage = preg_replace('/\s+/', ' ',$senderMessage);
        $chat_id = '962551563';
        $botToken = '5951508315:AAGjjTNc10kNK6JIuxF3lojOIVQ9OSFg5d8';
        $baseUrl = "https://api.telegram.org/bot{$botToken}/sendMessage?chat_id={$chat_id}&text={$senderMessage}";
        curl_setopt($ch,CURLOPT_URL, $baseUrl);
        
        $sendResponse = curl_exec($ch);

        if(curl_errno($ch)){
            $error = curl_error($ch);
        } else {
            return redirect()->route('home')->with('message','successfully sent');
        }

        curl_close($ch);
    }
}
