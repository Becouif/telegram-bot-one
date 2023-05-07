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
        $sendMessage = preg_replace('/\s+/', ' ',trim($senderMessage));
        // return $sendMessage;
        $chat_id = env('TELEGRAM_CHAT_ID');
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $baseUrl = "https://api.telegram.org/bot{$botToken}/sendMessage?chat_id={$chat_id}&text={$sendMessage}";
        curl_setopt($ch,CURLOPT_URL, $baseUrl);
        
        $sendResponse = curl_exec($ch);

        if(curl_errno($ch)){
            $error = curl_error($ch);
            return $error;
            // return redirect()->route('home')->with('message','message not send try again');
        } else {
            return redirect()->route('home')->with('message','successfully sent');
        }

        curl_close($ch);
    }
}
