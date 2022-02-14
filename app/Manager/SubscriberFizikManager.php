<?php

namespace App\Manager;

use Illuminate\Support\Facades\DB;


class SubscriberFizikManager {

    public function insertUser( $email, $password, $userRole, $isActive) {
        $sql = "insert into users (username, password, role, active) values (?, ?, ?, ?)";

        $userQuery = DB::insert($sql, [$email, $password, $userRole, $isActive]);
        return $userQuery;
        
    }

    public function userProfile($email) {
        $userSql = "select * from users where username='$email'";
        $userId = DB::select($userSql);
        return $userId;
    }
    public function insertSubscriberFizik($firstname, $lastname, $email, $password, $userRole, $isActive) {
        $user = $this->insertUser($email, $password, $userRole, $isActive);
        $userId = $this->userProfile($email);
        $id = $userId[0]->id;
        $subInsert = "insert into subscriber_fizik(firstname, lastname, email, user_id) values (?, ?, ?, ?)";
        $subInsertQuery = DB::insert($subInsert, [$firstname, $lastname, $email, $id]);
        // $user    List = DB::select("select * from subscriber_fizik sf join users us on us.id = sf.user_id where us.id = '$id'");

        return $subInsertQuery;
    }

    public function customLogin($username, $password) {
        $sql = "select * from users where username = '$username' and password = '$password'";
        $userList = DB::select($sql);

        return $userList;
    }

    public function profileManager($user_id) {
        $sql = "select id, firstname, lastname, email from subscriber_fizik where user_id=?";
        $userProfile = DB::select($sql, [$user_id]);

        return $userProfile;
    }


}

?>