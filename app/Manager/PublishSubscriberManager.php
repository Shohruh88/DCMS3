<?php

namespace App\Manager;

use Illuminate\Support\Facades\DB;

class PublishSubscriberManager {

    // public function getPublishSubscriber() {
    //     $sql = "select * from publishSubscriber pbr join publish psh on psh.id = pbr.publish_id";

    //     $publishSubscriber = DB::select($sql);

    //     return $publishSubscriber;
    // }

    public function publishSubManager($publish_id, $sfizikId, $syuridikId, $date, $muddati, $summa, $ispaid, $isSubscriber) {   
        // $sqlSelect = "select count(*) as soni from publishSubscriber where publish_id = ? and subscriberFizik_id=?";
        $sqlSelect = "select isSubscriber from publishSubscriber where publish_id = ? and subscriberFizik_id = ?";
        $count = DB::select($sqlSelect, [$publish_id, $sfizikId]);
        
        // return $count[0]->isSubscriber;
        // return $count;
        if (!empty($count)) {
            if ($count[0]->isSubscriber == 0) {
                return $this->updateIsSubscriberOnNull($publish_id, $sfizikId, $date); 
            } 
            elseif (count($count) > 0 && $count[0]->isSubscriber == 1) {
                // echo "if ni ichinda".$count[0]->soni;
                return false;
            }
        }  
        // $isSubscriberManager = new SearchManager();
        // $isSubscriber = $isSubscriberManager->getIsSubscriber($publish_id);
        // $count[0]->soni>0 && $isSubscriber == 1
        // elseif (count($count) > 0 && $count[0]->isSubscriber == 1) {
        //     // echo "if ni ichinda".$count[0]->soni;
        //     return false;
        // }
         else  {
            // echo "else ni ichinda".$count[0]->soni;
            $sqlInsert = "insert into publishSubscriber (publish_id, subscriberFizik_id, subscriberYuridik_id, subscriber_date, muddati, summa, ispaid, isSubscriber) values (?, ?, ?, ?, ?, ?, ?, ?)";
            $sqlInsertQuery = DB::insert($sqlInsert, [$publish_id, $sfizikId, $syuridikId, $date, $muddati, $summa, $ispaid, $isSubscriber]);

            return $sqlInsertQuery;
        }
    }

    public function getSubscribers($sfizikId) {

        // $sql = "select * from publish psh join publishSubscriber pr on psh.id = pr.publish_id join subscriber_fizik sf on sf.id = pr.subscriberFizik_id join publisher pshr on pshr.id = psh.publisher_id join published pd on psh.id = pd.publish_id where subscriberFizik_id = ? order by pd.date desc limit 1";

        $sql = "select pshr.publishername, psh.publishname, pd.image, pd.number, pr.publish_id from publish psh join publishSubscriber pr on psh.id = pr.publish_id join subscriber_fizik sf on sf.id = pr.subscriberFizik_id join publisher pshr on pshr.id = psh.publisher_id join published pd on psh.id = pd.publish_id where pr.isSubscriber = 1 and subscriberFizik_id = ?";

        $subscriberList = DB::select($sql, [$sfizikId]);

        return $subscriberList;
    }

    public function updateIsSubscriber($publish_id, $sfizikId, $date)
    {
        $sql = "update publishSubscriber set isSubscriber = 0, subscriber_date = ? where publish_id=? and subscriberFizik_id = ? ";
        $updateSubscriber = DB::update($sql, [$date, $publish_id, $sfizikId]);

        return $updateSubscriber;
    }

    public function updateIsSubscriberOnNull($publish_id, $sfizikId, $date) {
        $sql = "update publishSubscriber set isSubscriber = 1, subscriber_date = ? where publish_id=? and subscriberFizik_id = ?";
        $updateSubscriberOnNull = DB::update($sql, [$date, $publish_id, $sfizikId]);

        return $updateSubscriberOnNull;
    }

}

?>