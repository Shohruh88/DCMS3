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
        $sql = "select pd.id, psh.publishname, t.typename, pr.publishername, r.rubrikaname, pd.date, pd.tom, pd.number, pd.image from published pd join publish psh on psh.id = pd.publish_id join type t on t.id = psh.type_id join publisher pr on pr.id = psh.publisher_id join rubrika r on r.id = psh.rubrika_id where isPublished = 1";

        $publishedList = DB::select($sql);

        return $publishedList;
    }
    
    public function insertPublished($publishname, $date, $tom, $number, $image, $file, $isPublished) {

        $sql = "insert into published (publish_id, date, tom, number, image, file, isPublished) values (?, ?, ?, ?, ?, ?, ?)";

        $query = DB::insert($sql, [$publishname, $date, $tom, $number, $image, $file, $isPublished]);

        return $query;
    }

    public function showManager($id) {
        $sql = "select pd.id, psh.publishname, t.typename, pr.publishername, r.rubrikaname, pd.date, pd.tom, pd.number, pd.image, pd.file from published pd join publish psh on psh.id = pd.publish_id join type t on t.id = psh.type_id join publisher pr on pr.id = psh.publisher_id join rubrika r on r.id = psh.rubrika_id where pd.id = ?";
        $showPublished = DB::select($sql, [$id]);
        
        return $showPublished;
    }

    public function editPublished($id) {

    }

    public function updateManager() {

    }


    public function destroyManager($id, $isPublished) {
        $sql = "update published set isPublished = ? where id = ?";
        // $sql = "delete from published where id = ?";
        $destroyPublished = DB::update($sql, [$isPublished, $id]);

        return $destroyPublished;
    }

}

?>