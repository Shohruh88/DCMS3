<?php

namespace App\Http\Controllers;

use App\Manager\PublishSubscriberManager;
use App\Manager\SubscriberFizikManager;
use Illuminate\Http\Request;

class PublishSubscriberController extends Controller
{
    public function publishSubscriber(Request $request) {
       

       
        if ($request->session()->has('subscriber')) {

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
            $isSubscriber = 1;
            $publishManager = new PublishSubscriberManager();
            $publishSubAdded = $publishManager->publishSubManager($publish_id, $sfizikId, $syuridikId, $date, $muddati, $summa, $ispaid, $isSubscriber);
            
            // dd($publishSubAdded);
            // $updateSubscriberOnNull = $publishManager->updateIsSubscriberOnNull($sfizikId);

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

        else {
            return response()->json([
                'error' => 'Siz royhatdan oting obuna bolish uchun'
            ]);
        }
        
    }

    public function subscribers() {

            $user_id = session()->get('subscriber')[0]->id;
            $profileManager = new SubscriberFizikManager();
            $sfizikId = $profileManager->profileManager($user_id)[0]->id;

            $subscriberManager = new  PublishSubscriberManager();
            $subscriberList = $subscriberManager->getSubscribers($sfizikId);
            // dd($user_id);
    
        return view('search.subscriber', ['subscriberList' => $subscriberList]);
    }

    public function updateIsSubscriberController(Request $request) {

        $publish_id = $request->publish_id;
        // $isSubscriber = 0;

        $updateIsSubscriberManager = new PublishSubscriberManager();
        $updateIsSubscriber = $updateIsSubscriberManager->updateIsSubscriber($publish_id);
        
        if ($updateIsSubscriber) {
            return response()->json([
                'success' => 'Siz obunani bekor qildingiz',
                'status' => 1
            ]);
        }
        else {
            return response()->json([
                'error' => 'Xatolik boldi qayta urining',
                'status' => 0
            ]);
        }

        
        
    }
}



// $user_id = session()->get('subscriber')[0]->publish_id;

        // $profileManager = new SubscriberFizikManager();
        // $sfizikId = $profileManager->profileManager($user_id)[0]->id;

        
        // $updateIsSubscriber = $updateIsSubscriberManager->updateIsSubscriber($id);
     
        // if ($updateIsSubscriber) {
        //     return redirect()->route('profile.subscribers');
        // }