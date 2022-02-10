<?php

namespace App\Manager;

use Illuminate\Support\Facades\DB;

class PublisherManager {

    public function insertPublisher($publishername, $leader_name, $address, $tel_number, $email) {
  
        $sql = "insert into publisher (publishername, leader_name, address, tel_number, email) values (?, ?, ?, ?, ?)";

        $query = DB::insert($sql, [$publishername, $leader_name, $address, $tel_number, $email]);

        return $query;
    }

}

?>