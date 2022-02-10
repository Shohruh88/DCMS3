<?php

namespace App\Manager;

use Illuminate\Support\Facades\DB;

class PublishManager {

    public function getTypeList() {
        $sqlType = "select * from type";
        $typeList = DB::select($sqlType);

        return $typeList;
    }

    public function getRubrikaList() {
        $sqlRubrika = "select * from rubrika";
        $rubrikaList = DB::select($sqlRubrika);

        return $rubrikaList;
    }

    public function getPublisherList() {
        $sqlPublisher = "select * from publisher";
        $publisherList = DB::select($sqlPublisher);

        return $publisherList;
    }

    public function getPublishData() {
        $sql = "select psh.publishname, ty.typename, rb.rubrikaname, pr.publishername from publish psh join type ty on ty.id = psh.type_id join rubrika rb on rb.id = psh.rubrika_id join publisher pr on pr.id = psh.publisher_id";

        $publishList = DB::select($sql);

        return $publishList;
    }

    public function insertPublish($publishname, $type_id, $rubrika_id, $publisher_id) {
        
        $sql = "insert into publish (publishname, type_id, rubrika_id, publisher_id) values (?, ?, ?, ?)";
        $query = DB::insert($sql, [$publishname, $type_id, $rubrika_id, $publisher_id]);

        return $query;
    }

}


?>