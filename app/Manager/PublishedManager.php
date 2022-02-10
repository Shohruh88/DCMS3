<?php

namespace App\Manager;


use Illuminate\Support\Facades\DB;

class PublishedManager {
    
    public function getPublishList() {
        $sql = "select id, publishname from publish";
        $publishList = DB::select($sql);

        return $publishList;
    }

    public function getPublishedList() {
        $sql = "select * from published pd join publish psh on psh.id = pd.publish_id join type t on t.id = psh.type_id join publisher pr on pr.id = psh.publisher_id join rubrika r on r.id = psh.rubrika_id";

        $publishedList = DB::select($sql);

        return $publishedList;
    }
    
    public function insertPublished($publishname, $date, $tom, $number, $image) {

        $sql = "insert into published (publish_id, date, tom, number, image) values (?, ?, ?, ?, ?)";

        $query = DB::insert($sql, [$publishname, $date, $tom, $number, $image]);

        return $query;
    }

}

?>