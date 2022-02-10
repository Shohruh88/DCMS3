<?php

namespace App\Manager;

use Illuminate\Support\Facades\DB;

class ArticleManager {

    public function getArticleList() {
        $sql = "select * from article join published on published.id = article.published_id join publish on publish.id = published.publish_id";

        $articleList = DB::select($sql);

        return $articleList;

    }

    public function createArticleView() {
        $sql = "select * from published pd join publish psh on pd.publish_id = psh.id";
        $publishedPublish = DB::select($sql);

        return $publishedPublish;
    }

    public function insertArticleList($title, $author, $publishedname, $description, $author_count, $page_count) {
        $sql = "insert into article (title, author, published_id, description, author_count, page_count) values (?, ?, ?, ?, ?, ?)";

        $query = DB::insert($sql, [$title, $author, $publishedname, $description, $author_count, $page_count]);

        return $query;

    }

}

?>