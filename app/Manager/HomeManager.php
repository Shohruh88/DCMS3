<?php

namespace App\Manager;

use Illuminate\Support\Facades\DB;

class HomeManager {

    // public function listForHome() {
    //     $sql = "select id, image from published";

    //     $homeList = DB::select($sql);   

    //     return $homeList;
    // }

    public function JurnalList($j_id) {
        $sql = "select pd.id, pd.image from published pd join publish psh on psh.id = pd.publish_id join type t on t.id = psh.type_id where t.id = ?";
        $jurnalList = DB::select($sql, [$j_id]);

        return $jurnalList;
    }

    public function GazetaList($g_id) {
        $sql = "select pd.id, pd.image from published pd join publish psh on psh.id = pd.publish_id join type t on t.id = psh.type_id where t.id = ?";
        $gazetaList = DB::select($sql, [$g_id]);

        return $gazetaList;
    }

    public function KitobList($k_id) {
        $sql = "select pd.id, pd.image from published pd join publish psh on psh.id = pd.publish_id join type t on t.id = psh.type_id where t.id = ?";
        $kitobList = DB::select($sql, [$k_id]);

        return $kitobList;
    }
    
}

?>