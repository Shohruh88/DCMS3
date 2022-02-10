<?php

namespace App\Http\Controllers;

use App\Manager\PublishSubscriberManager;
use App\Manager\SubscriberFizikManager;
use Illuminate\Http\Request;

class PublishSubscriberController extends Controller
{
    public function publishSubscriber(Request $request) {
        $publish_id = $request->publish_id;
        
        $date = $request->date;

        $user_id = $request->session()->get('subscriber')[0]->id;
        $profileManager = new SubscriberFizikManager();
        $sfizikId = $profileManager->profileManager($user_id)[0]->id;
        // dd($sfizikId);

        $syuridikId = 0;
        $muddati = 0;
        $summa = 0;
        $ispaid = 1;
        
        $publishManager = new PublishSubscriberManager();
        $publishSubAdded = $publishManager->publishSubManager($publish_id, $sfizikId, $syuridikId, $date, $muddati, $summa, $ispaid);
        // dd($publishSubAdded);
        if (!$publishSubAdded){
            return response()->json([
                'error' => 'Siz obuna bolgansiz ',
                'status' => 0
            ]);
        } else{ 
            return response()->json([
                'success' => 'Obuna boldingiz ',
                'status' => 1        
            ]);
        }
       
    }

    public function subscribers() {

        $user_id = session()->get('subscriber')[0]->id;
        $profileManager = new SubscriberFizikManager();
        $sfizikId = $profileManager->profileManager($user_id)[0]->id;

        $subscriberManager = new  PublishSubscriberManager();
        $subscriberList = $subscriberManager->getSubscribers($sfizikId);
        // dd($subscriberList);
        return view('search.subscriber', ['subscriberList' => $subscriberList]);
    }
}
