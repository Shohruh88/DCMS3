<?php

namespace App\Manager;

use Illuminate\Support\Facades\DB;

class HomeManager {

    public function listForHome() {
        $sql = "select * from article ar join published pd on pd.id = ar.published_id join publish psh on psh.id = pd.publish_id join rubrika r on r.id = psh.rubrika_id join publisher pr on pr.id = psh.publisher_id";

        $homeList = DB::select($sql);

        return $homeList;
    }

}

?>