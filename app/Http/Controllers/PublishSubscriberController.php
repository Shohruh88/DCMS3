<?php

namespace App\Http\Controllers;

use App\Manager\PublishSubscriberManager;
use App\Manager\SubscriberFizikManager;
use Illuminate\Http\Request;

class PublishSubscriberController extends Controller
{
    public function session()
    {
        $user_id = session()->get('user')[0]->id;
        $profileManager = new SubscriberFizikManager();
        $sfizikId = $profileManager->profileManager($user_id)[0]->id;

        return $sfizikId;
    }

    public function publishSubscriber(Request $request)
    {



        if ($request->session()->has('user')) {

            $publish_id = $request->publish_id;

            $date = $request->date;
            $user_id = $request->session()->get('user')[0]->id;

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

            if (!$publishSubAdded) {

                return response()->json([
                    'status' => 0
                ]);
            } else {
                return response()->json([
                    'success' => 'Obuna boldingiz ',
                    'status' => 1
                ]);
            }
        } else {
            return response()->json([
                'status' => -1
            ]);
        }
    }

    public function subscribers()
    {
        if (session()->has('user')) {
            $sfizikId = $this->session();
            // dd($sfizikId);
            $subscriberManager = new  PublishSubscriberManager();
            $publish_id = $subscriberManager->upressAllSubscriber();
            $subscriberList = $subscriberManager->getSubscribers($sfizikId);
            $isSubscriberGazeta = $subscriberManager->upressSubscriberGazeta($sfizikId);
            $isSubscriberJurnal = $subscriberManager->upressSubscriberJurnal($sfizikId);
            $isSubscriberKitob = $subscriberManager->upressSubscriberKitob($sfizikId);
            // dd($subscriberGazetaList, $subscriberJurnalList, $subscriberKitobList);
            // dd($subscriberList, $publish_id, $isSubscriberGazeta, $isSubscriberJurnal, $isSubscriberKitob);

            return view('search.subscriber', [
                'title' => 'Subscribers',
                'subscriberList' => $subscriberList,
                'publishID' => $publish_id,
                'isSubscriberGazeta' => $isSubscriberGazeta,
                'isSubscriberJurnal' => $isSubscriberJurnal,
                'isSubscriberKitob' => $isSubscriberKitob
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    public function updateIsSubscriberController(Request $request)
    {

        $publish_id = $request->publish_id;
        $date = $request->date;
        // $isSubscriber = 0;
        $sfizikId = $this->session();

        $updateIsSubscriberManager = new PublishSubscriberManager();
        $updateIsSubscriber = $updateIsSubscriberManager->updateIsSubscriber($publish_id, $sfizikId, $date);

        if ($updateIsSubscriber) {
            return response()->json([
                'success' => 'Siz obunani bekor qildingiz',
                'status' => 1
            ]);
        } else {
            return response()->json([
                'error' => 'Xatolik boldi qayta urining',
                'status' => 0
            ]);
        }
    }
}
