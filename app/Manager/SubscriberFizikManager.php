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
        $sql = "select us.id, us.username, us.password, sf.firstname, sf.lastname from users us join subscriber_fizik sf on us.id = sf.user_id where username = '$username' and password = '$password'";
        $user = DB::select($sql);

        return $user;
    }

    public function profileManager($user_id) {
        $sql = "select id, user_id, firstname, lastname, email from subscriber_fizik where user_id=?";
        $userProfile = DB::select($sql, [$user_id]);

        return $userProfile;
    }

    public function editProfileManager($user_id) {
        $sql = "select sf.id, sf.user_id, sf.firstname, sf.lastname,  sf.email, us.password from subscriber_fizik sf join users us on us.id = sf.user_id where user_id = ?";
        $editProfile = DB::select($sql, [$user_id]);

        return $editProfile;
    }

    public function usersUpdate($email, $password, $userID) {
        $sql = "update users set username = ?, password = ? where id = ?";
        $userUpdate = DB::update($sql, [$email, $password, $userID]);

        return $userUpdate;
    }

    public function updateProfileManager($firstname, $lastname, $email, $password, $userID) {
        $userUpdate = $this->usersUpdate($email, $password, $userID);

        if ($userUpdate) {
            $sql = "update subscriber_fizik set firstname = ?, lastname = ?, email = ? where user_id = ?";
            $subscriberFizik = DB::update($sql, [$firstname, $lastname, $email, $userID]);

            return $subscriberFizik;
        }
    }

}

?>