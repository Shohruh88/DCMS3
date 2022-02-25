<?php

namespace App\Manager;

use Illuminate\Support\Facades\DB;

class SearchManager {

    public function getSearchSqlQuery($author, $title, $rubrikaname, $keyWords) {

        $author = '%' . $author . '%';
        $title = '%' . $title . '%';
        $keyWords = '%' . $keyWords . '%';

        $sql = "select pd.publish_id, psh.publishname, ar.author, pr.publishername, ar.description, pd.date, pd.image from article ar join published pd on pd.id = ar.published_id join publish psh on psh.id = pd.publish_id join rubrika r on r.id = psh.rubrika_id join publisher pr on pr.id = psh.publisher_id where";       

        $isParamsHaveValue = false;
        $paramsSql= ""; 
        $params = array();
        if($author != '') {
            $paramsSql = $paramsSql . " ar.author like ?";
            array_push($params, $author);
            $isParamsHaveValue = true;
        }

        if ($title != '' && !empty($paramsSql)) {
            $paramsSql = $paramsSql . " and ar.title like ?";
            array_push($params, $title);
            $isParamsHaveValue = true;
        }
        else {
            $paramsSql = $paramsSql . " ar.title like ?";
            array_push($params, $title);
            $isParamsHaveValue = true;
        }

        if ($rubrikaname > 0 && !empty($paramsSql)) {
            $paramsSql = $paramsSql . " and r.id = ?";
            array_push($params, $rubrikaname);
            $isParamsHaveValue = true;
        }
        elseif ( $rubrikaname < 0 ){
            // $paramsSql = $paramsSql . " r.id = ?";
            // array_push($params, $rubrikaname);
            $isParamsHaveValue = false;
        }

        if ($keyWords != '' && !empty($paramsSql)) {
            $paramsSql = $paramsSql . " and ar.description like ?"; 
            array_push($params, $keyWords);
            $isParamsHaveValue = true;
        }
        else {
            $paramsSql = $paramsSql . " ar.description like ?";
            array_push($params, $keyWords);
            $isParamsHaveValue = true;  
        }
       
        $sqlResult = $sql . $paramsSql;   
        
        $query = DB::select($sqlResult, $params);
        return $query;
    }

    public function getPublished($id) {
        $sql = "select pd.publish_id, pd.image from published pd join publish psh on psh.id = pd.publish_id join rubrika r on r.id = psh.rubrika_id where psh.id=?";
        $publishedNumber = DB::select($sql, [$id]); 

        return $publishedNumber;
    }

    // Rubrikaning id sini olish publish boyicha
    public function getRubrikaId($id) {
        $sql = "select rubrika_id from publish where id=?";
        
        $publishRubrikaId = DB::select($sql, [$id]);

        // return $publishRubrikaId;
        return $publishRubrikaId[0]->rubrika_id;   
    }

    // Qidirlgan nashrning mavzusiga oid bolgan boshqa nashrlarni ham olish uchun method
    public function SearchPublishForRubrika($rubrika_id) {
        $sql = "select pd.image, pd.publish_id from publish psh join rubrika r on r.id = psh.rubrika_id join published pd on pd.publish_id = psh.id where r.id = ?";
        $rubrikaList = DB::select($sql, [$rubrika_id]);
        return $rubrikaList;
    }

    // Nashrlarni publish:::id boyicha chiqarish uchun SearchManagerning methodi
    public function showSearch($id) {
        $sql = "select pd.id, pd.publish_id, pr.publishername, r.rubrikaname, psh.publishname, te.typename, pd.date, pd.image from publish psh join published pd on psh.id = pd.publish_id join rubrika r on r.id = psh.rubrika_id join publisher pr on pr.id = psh.publisher_id join type te on te.id = psh.type_id where psh.id = ?";  
        $searchList = DB::select($sql, [$id]);

        return $searchList;
    }

    // Publishsubscriberdagi malumotlarni tekshirish uchun method....
    public function getIsSubscriber($publish_id, $sfizikId) {
       $sql = "select isSubscriber from publishSubscriber where publish_id = ? and subscriberFizik_id = ?";
       $isSubscriber = DB::select($sql, [$publish_id, $sfizikId]);
       return $isSubscriber;
    }

    public function getNRegister($publish_id) {
        $sql = "select isSubscriber from publishSubscriber where publish_id = ?";
        $isSubscriber = DB::select($sql, [$publish_id]);
        return $isSubscriber;
    }

}

?>