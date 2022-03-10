<?php

namespace App\Manager;

use Illuminate\Support\Facades\DB;

class ArticleManager {

    public function getArticleList() {
        $sql = "select * from article join published on published.id = article.published_id join publish on publish.id = published.publish_id";

        $articleList = DB::select($sql);

        return $articleList;

    }

    public function insertArticleList($title, $author, $publishedname, $description, $author_count, $page_count) {
        $sql = "insert into article (title, author, published_id, description, author_count, page_count) values (?, ?, ?, ?, ?, ?)";

        $query = DB::insert($sql, [$title, $author, $publishedname, $description, $author_count, $page_count]);

        return $query;

    }

    public function publisherSelectManager($publishername) {    
        $publishername = '%' . $publishername . '%';
        $sql = "select id, publishername from publisher where publishername like ?";
        $publisherList = DB::select($sql, [$publishername]);

        return $publisherList;
    }

    public function publishedSelectManager($publisher_id, $publishname) {
        $publishname = '%' . $publishname . '%';
        $sql = "select pd.id, psh.publishname from published pd join publish psh on psh.id = pd.publish_id join publisher pr on pr.id = psh.publisher_id where pr.id = ? and publishname like ?";
        $publishedList = DB::select($sql, [$publisher_id, $publishname]);

        return $publishedList;
    }

    // public function publisherListManager($publisher_id) {
    //     $sql = "select id, publishername from publisher where id = ?";
    //     $publisherList = DB::select($sql, [$publisher_id]);

    //     return $publisherList;
    // }

    // public function publishedListManager($published_id) {
    //     $sql = "select pd.id, psh.publishname from published pd join publish psh on psh.id = pd.publish_id join publisher pr on pr.id = psh.publisher_id where pd.id = ?";
    //     $publishedList = DB::select($sql, [$published_id]);

    //     return $publishedList;
    // }

    public function publisherAndPublishedManager($published_id) {
        $sql = "select pd.id, pr.publishername, psh.publishname from published pd join publish psh on psh.id = pd.publish_id join publisher pr on pr.id = psh.publisher_id where pd.id = ?";
        $selectList = DB::select($sql, [$published_id]);

        return $selectList;
    }
}

?>