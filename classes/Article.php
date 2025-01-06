<?php
namespace App;

use App\CRUD;
require_once dirname(__DIR__) . './vendor/autoload.php'; 

class Article{
    
    private int $id;
    private string $title;
    private string $slug;
    private string $content;
    private int $category_id;
    private string $featured_image;
    private string $status;
    private string $scheduled_date;
    private int $author_id;
    private string $created_at;
    private string $updated_at;
    private int $views;



    public static function getAllArticles(){
        $articles =CRUD::select('articles join categories on articles.category_id=categories.id join users on articles.author_id=users.id');
        return $articles;
    
    }

    public static function getCountArticle(){
        $articles =CRUD::select('articles','count(*) as count');
        
            echo($articles[0]['count']);
            
       
    }

}

?>

