<?php

namespace App\Http\Controllers;

use App\Manager\HomeManager;
use App\Manager\PublishSubscriberManager;
use Illuminate\Http\Request;

class UpressController extends Controller
{
    public function getUpressGazeta()
    {
        $g_id = 1;
        $homeManager = new HomeManager();
        $gazetaList = $homeManager->gazetaList($g_id);

        return view('upress.upressGazeta', [
            'gazetaList' => $gazetaList
        ]);
    }

    public function postUpressGazeta(Request $request)
    {

            $pbController = new PublishSubscriberController();
            $gPublishID = $request->publish_id;
            $date = $request->date;
            
            $sfizikId = $pbController->session();
            $syuridikId = 0;
            $muddati = 0;
            $summa = 0;
            $ispaid = 1;
            $isSubscriber = 1;

            $publishManager = new PublishSubscriberManager();
            $publishSubAdded = $publishManager->publishSubManager($gPublishID, $sfizikId, $syuridikId, $date, $muddati, $summa, $ispaid, $isSubscriber);
            // dd($publishSubAdded);
            if (!$publishSubAdded) {

                return response()->json([
                    'status' => 0
                ]);
            } else {
                return response()->json([
                    'status' => 1
                ]);
            }
    }

    public function getUpressJurnal()
    {
        $j_id = 4;
        $homeManager = new HomeManager();
        $jurnalList = $homeManager->jurnalList($j_id);
        // dd($jurnalList);
        return view('upress.upressJurnal', [
            'jurnalList' => $jurnalList
        ]);
    }

    public function postUpressJurnal(Request $request)
    {
        if (session()->has('user')) {

            $pbController = new PublishSubscriberController();
            $jPublishID = $request->publish_id;
            $date = $request->subscriberDate;
            $sfizikId = $pbController->session();
            $syuridikId = 0;
            $muddati = 0;
            $summa = 0;
            $ispaid = 1;
            $isSubscriber = 1;

            $publishManager = new PublishSubscriberManager();
            $publishSubAdded = $publishManager->publishSubManager($jPublishID, $sfizikId, $syuridikId, $date, $muddati, $summa, $ispaid, $isSubscriber);

            if (!$publishSubAdded) {

                return response()->json([
                    'status' => 0
                ]);
            } else {
                return response()->json([
                    'status' => 1
                ]);
            }
        } else {
            return response()->json([
                'status' => -1
            ]);
        }
    }

    public function getUpressKitob()
    {
        $k_id = 2;
        $homeManager = new HomeManager();
        $kitobList = $homeManager->kitobList($k_id);

        return view('upress.upressKitob', [
            'kitobList' => $kitobList
        ]);
    }

    public function postUpressKitob(Request $request)
    {
        if (session()->has('user')) {

            $pbController = new PublishSubscriberController();
            $kPublishID = $request->publish_id;
            $date = $request->subscriberDate;
            // dd($subscriberDate, $jPublishID);
            $sfizikId = $pbController->session();
            $syuridikId = 0;
            $muddati = 0;
            $summa = 0;
            $ispaid = 1;
            $isSubscriber = 1;

            $publishManager = new PublishSubscriberManager();
            $publishSubAdded = $publishManager->publishSubManager($kPublishID, $sfizikId, $syuridikId, $date, $muddati, $summa, $ispaid, $isSubscriber);

            if (!$publishSubAdded) {

                return response()->json([
                    'status' => 0
                ]);
            } else {
                return response()->json([
                    'status' => 1
                ]);
            }
        } else {
            return response()->json([
                'status' => -1
            ]);
        }
    }
}
