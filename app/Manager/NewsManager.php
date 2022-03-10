<?php

    namespace App\Manager;

use Illuminate\Support\Facades\DB;

    class NewsManager {

        public function newsManager($startDate, $endDate) {
            $sql = "select * from published where date between '$startDate' and '$endDate'";
            $datePublishedList = DB::select($sql);

            return $datePublishedList;
        }

    }

?>