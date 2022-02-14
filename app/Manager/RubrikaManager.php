<?php

namespace App\Manager;

use Illuminate\Support\Facades\DB;

class RubrikaManager {

    public function getAllRubrikaData() {
        $sql = "select * from rubrika";
        $rubrikaData = DB::select($sql);

        return $rubrikaData;
    }

    public function addRubrikaData($rubrikaname) {
        $sql = "insert into rubrika (rubrikaname) values (?)";
        $rubrika = DB::insert($sql, [$rubrikaname]);

        return $rubrika;
    }

}

?>