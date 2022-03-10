<?php

namespace App\Manager;

use Illuminate\Support\Facades\DB;

class PublishSubscriberManager {

    public function publishSubManager($publish_id, $sfizikId, $syuridikId, $date, $muddati, $summa, $ispaid, $isSubscriber) {   
        // $sqlSelect = "select count(*) as soni from publishSubscriber where publish_id = ? and subscriberFizik_id=?";
        $sqlSelect = "select isSubscriber from publishSubscriber where publish_id = ? and subscriberFizik_id = ?";
        $count = DB::select($sqlSelect, [$publish_id, $sfizikId]);
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

        $sql = "select pshr.publishername, psh.publishname, pd.image, pd.number, pr.publish_id, pd.id, t.typename from publish psh join publishSubscriber pr on psh.id = pr.publish_id join subscriber_fizik sf on sf.id = pr.subscriberFizik_id join publisher pshr on pshr.id = psh.publisher_id join published pd on psh.id = pd.publish_id join type t on t.id = psh.type_id where pr.isSubscriber = 1 and subscriberFizik_id = ? and pshr.id > 1";

        $subscriberList = DB::select($sql, [$sfizikId]);

        return $subscriberList;
    }
    // Obuna bolingan gazetalarni hammasini chiqarish isSubscriber = 1; 
    public function getSubscriberGazetaList($sfizikId) {
        $isSubscriberGazeta = $this->upressSubscriberGazeta($sfizikId);
        if (!empty($isSubscriberGazeta) && $isSubscriberGazeta[0]->isSubscriber == 1) {
            $sql = "select * from published pd join publish psh on psh.id = pd.publish_id join type t on t.id = psh.type_id join publisher pr on pr.id = psh.publisher_id where t.id = 1 and pr.id > 1";
            $subscriberGazetaList = DB::select($sql);
            return $subscriberGazetaList;
        } else {
            return "";
        }
        
    }

    // Obuna bolingan jurnallarni hammasini chiqarish isSubscriber = 1; 
    public function getSubscriberJurnalList($sfizikId) {
        $isSubscriberJurnal = $this->upressSubscriberJurnal($sfizikId);
        if (empty($isSubscriberJurnal) || $isSubscriberJurnal[0]->isSubscriber == 0) {
            return "";
        } else {
            $sql = "select * from published pd join publish psh on psh.id = pd.publish_id join type t on t.id = psh.type_id join publisher pr on pr.id = psh.publisher_id where t.id = 4 and pr.id > 1";
            $subscriberJurnalList = DB::select($sql);
            return $subscriberJurnalList;
        }
        
    }

    // Obuna bolingan kitoblarni hammasini chiqarish isSubscriber = 1; 
    public function getSubscriberKitobList($sfizikId) {
        $isSubscriberKitob = $this->upressSubscriberKitob($sfizikId);
        if (empty($isSubscriberKitob) || $isSubscriberKitob[0]->isSubscriber == 0) {
            return "";
        } else {
            $sql = "select * from published pd join publish psh on psh.id = pd.publish_id join type t on t.id = psh.type_id join publisher pr on pr.id = psh.publisher_id where t.id = 1 and pr.id > 1";
            $subscriberKitobList = DB::select($sql);
            return $subscriberKitobList;
        }
        
    }

    // Upressdagi hamma jurnal, gazeta yoki kitoblar uchun obuna bolish
    public function upressAllSubscriber() {
        $sql = "select id from publish where publisher_id = 1";
        $publish_id = DB::select($sql);

        return $publish_id;
    }

    public function upressSubscribersAll($typeID, $sfizikId) {
        $sql = "select isSubscriber from publishSubscriber psr join publish psh on psh.id = psr.publish_id join publisher pr on pr.id = psh.publisher_id join type t on t.id = psh.type_id where t.id = ? and pr.id = 1 and subscriberFizik_id = ?";
        $isSubscriberAll = DB::select($sql, [$typeID, $sfizikId]);

        return $isSubscriberAll;
    }

    public function upressSubscriberGazeta($sfizikId) {
        $sql = "select isSubscriber from publishSubscriber psr join publish psh on psh.id = psr.publish_id join publisher pr on pr.id = psh.publisher_id join type t on t.id = psh.type_id where t.id = 1 and pr.id = 1 and subscriberFizik_id = ?";
        $isSubscriberGazeta = DB::select($sql, [$sfizikId]);

        return $isSubscriberGazeta;
    }

    public function upressSubscriberJurnal($sfizikId) {
        $sql = "select isSubscriber from publishSubscriber psr join publish psh on psh.id = psr.publish_id join publisher pr on pr.id = psh.publisher_id join type t on t.id = psh.type_id where t.id = 4 and pr.id = 1 and subscriberFizik_id = ?";
        $isSubscriberJurnal = DB::select($sql, [$sfizikId]);

        return $isSubscriberJurnal;
    }

    public function upressSubscriberKitob($sfizikId) {
        $sql = "select isSubscriber from publishSubscriber psr join publish psh on psh.id = psr.publish_id join publisher pr on pr.id = psh.publisher_id join type t on t.id = psh.type_id where t.id = 2 and pr.id = 1 and subscriberFizik_id = ?";
        $isSubscriberKitob = DB::select($sql, [$sfizikId]);

        return $isSubscriberKitob;
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

    public function getTypeId($publish_id) {
        $sql = "select type_id from publish where id = ?";
        $typeID = DB::select($sql, [$publish_id]);

        return $typeID[0]->type_id;
    }

}

?>