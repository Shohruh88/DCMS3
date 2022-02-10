<?php

namespace App\Manager;

use Illuminate\Support\Facades\DB;

class PublishSubscriberManager {

    public function getPublishSubscriber() {
        $sql = "select * from publishSubscriber pbr join publish psh on psh.id = pbr.publish_id";

        $publishSubscriber = DB::select($sql);

        return $publishSubscriber;
    }

    public function publishSubManager($publish_id, $sfizikId, $syuridikId, $date, $muddati, $summa, $ispaid) {   
        $sqlSelect = "select count(*) as soni from publishSubscriber where publish_id = ? and subscriberFizik_id=?";
        $count = DB::select($sqlSelect, [$publish_id, $sfizikId]);
        // return $count;    

        if ($count[0]->soni>0) {
            // echo "if ni ichinda".$count[0]->soni;
            return false;
        } else  {
            // echo "else ni ichinda".$count[0]->soni;
            $sqlInsert = "insert into publishSubscriber (publish_id, subscriberFizik_id, subscriberYuridik_id, subscriber_date, muddati, summa, ispaid) values (?, ?, ?, ?, ?, ?, ?)";
            $sqlInsertQuery = DB::insert($sqlInsert, [$publish_id, $sfizikId, $syuridikId, $date, $muddati, $summa, $ispaid]);

            return $sqlInsertQuery;
        }
    }

    public function getSubscribers($id) {

        $sql = "select * from publishSubscriber pr join publish psh on psh.id = pr.publish_id join subscriber_fizik sf on sf.id = pr.subscriberFizik_id join publisher pshr on pshr.id = psh.publisher_id join published pd on psh.id = pd.publish_id where subscriberFizik_id = ? order by pd.date desc  limit 1";

        $subscriberList = DB::select($sql, [$id]);

        return $subscriberList;
    }

}

?>