<?php

namespace App\Manager;

use Illuminate\Support\Facades\DB;

class AdminManager {

    public function adminLoginManager($login, $password, $role) {
        $sql = "select * from users where username = ? and password = ? and role = ?";
        $admin = DB::select($sql, [$login, $password, $role]);

        return $admin;
    }

}

?>