<?php

namespace App;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
use App\CRUD;
require_once dirname(__DIR__) . './vendor/autoload.php'; 

class Article{
    
    private static int $id;
    private static string $title;
    private static string $slug;
    private static string $content;
    private static int $category_id;
    private static string $featured_image;
    private static string $status;
    private static string $scheduled_date;
    private static int $author_id;
    private static string $created_at;
    private static string $updated_at;
    private static int $views;



    public static function getAllArticles(){
        $articles =CRUD::select('
        articles a JOIN 
        categories c ON a.category_id = c.id
    JOIN 
        users u ON a.author_id = u.id
    LEFT JOIN 
        article_tags at ON a.id = at.article_id 
    LEFT JOIN 
        tags t ON at.tag_id = t.id 
    GROUP BY a.id
    ORDER BY a.created_at DESC;',' 
        a.id AS articles_id, 
        a.title AS title,
        c.name AS categorie,
        u.username AS auteurName,
        a.slug AS article_slug,
        a.content AS content,
        a.category_id,
        a.featured_image,
        a.status,
        a.scheduled_date,
        a.author_id,
        a.created_at,
        a.updated_at,
        a.views,
        GROUP_CONCAT(t.name) AS tags_name ');
        return $articles;
    
    }
    public static function getAllArticlesDraft(){
      
        $articles =CRUD::select('articles a JOIN 
        categories c ON a.category_id = c.id
    JOIN 
        users u ON a.author_id = u.id
    LEFT JOIN 
        article_tags at ON a.id = at.article_id 
    LEFT JOIN 
        tags t ON at.tag_id = t.id ',' 
        a.id AS articles_id, 
        a.title AS title,
        c.name AS categorie,
        u.username AS auteurName,
        a.slug AS article_slug,
        a.content AS content,
        a.category_id,
        a.featured_image,
        a.status,
        a.scheduled_date,
        a.author_id,
        a.created_at,
        a.updated_at,
        a.views,
        GROUP_CONCAT(t.name ORDER BY t.name ASC) AS tags_name ','a.status=? GROUP BY a.id',['draft']);
        return $articles;
    
    }

    public static function getArticle($slug) {
        $articles = CRUD::select(
            'articles a 
            JOIN categories c ON a.category_id = c.id
            JOIN users u ON a.author_id = u.id
            LEFT JOIN article_tags at ON a.id = at.article_id 
            LEFT JOIN tags t ON at.tag_id = t.id',
            'a.id AS articles_id,
            a.title AS title,
            c.name AS categorie,
            u.username AS auteurName,
            a.slug AS article_slug,
            a.content AS content,
            a.category_id,
            a.featured_image,
            a.status,
            a.scheduled_date,
            a.author_id,
            a.created_at,
            a.updated_at,
            a.views,
            GROUP_CONCAT(t.name ORDER BY t.name ASC) AS tags_name', 
            'a.slug = ?',
            [$slug]
        );
        
        return $articles;
    }
    public static function getArticleByCategory($category) {
        $articles = CRUD::select(
            'articles a 
            JOIN categories c ON a.category_id = c.id
            JOIN users u ON a.author_id = u.id
            LEFT JOIN article_tags at ON a.id = at.article_id 
            LEFT JOIN tags t ON at.tag_id = t.id',
            'a.id AS articles_id,
            a.title AS title,
            c.name AS categorie,
            u.username AS auteurName,
            a.slug AS article_slug,
            a.content AS content,
            a.category_id,
            a.featured_image,
            a.status,
            a.scheduled_date,
            a.author_id,
            a.created_at,
            a.updated_at,
            a.views,
            GROUP_CONCAT(t.name ORDER BY t.name ASC) AS tags_name', 
            'c.name = ? GROUP BY a.id',
            [$category]
        );
        
        return $articles;
    }

    public static function getArticleByAuteur($id) {
        $articles = CRUD::select(
            'articles a 
            JOIN categories c ON a.category_id = c.id
            JOIN users u ON a.author_id = u.id
            LEFT JOIN article_tags at ON a.id = at.article_id 
            LEFT JOIN tags t ON at.tag_id = t.id',
            'a.id AS articles_id,
            a.title AS title,
            c.name AS categorie,
            u.username AS auteurName,
            a.slug AS article_slug,
            a.content AS content,
            a.category_id,
            a.featured_image,
            a.status,
            a.scheduled_date,
            a.author_id,
            a.created_at,
            a.updated_at,
            a.views,
            GROUP_CONCAT(t.name ORDER BY t.name ASC) AS tags_name', // Concatenate tag names
            'u.id = ?GROUP BY a.id',
            [$id]
        );
        
        return $articles;
    }

    public static function getLastArticle() {
        $articles = CRUD::select(
            'articles ORDER BY created_at DESC LIMIT 1','id'
        );
        
        return $articles;
    }

    
    public static function getCountArticle(){
        $articles =CRUD::select('articles','count(*) as count');
        
            echo($articles[0]['count']);
            
    }
    static function  create_slug($string) {
        $string = preg_replace('~[^\pL\d]+~u', '-', $string);
    
        if (function_exists('iconv')) {
            $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
        }
    
        $string = preg_replace('~[^-\w]+~', '', $string);
    
        $string = trim($string, '-');
    
        $string = preg_replace('~-+~', '-', $string);
    
        $string = strtolower($string);
    
        if (empty($string)) {
            return 'n-a';
        }
    
        return $string;
    }
    
    public static function addArticle(){
        if (isset($_POST['title'])) {
            self::$title = $_POST['title'];
            self::$slug = self::create_slug(self::$title);
            self::$content = $_POST['content'];
            self::$category_id = $_POST['category_id'];
            if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] == 0) {
                $uploadDirectory = '../uploads/';
                $imageFileName = basename($_FILES['featured_image']['name']);
                $imageFilePath = $uploadDirectory . $imageFileName;
    
                if (move_uploaded_file($_FILES['featured_image']['tmp_name'], $imageFilePath)) {
                    self::$featured_image = $imageFilePath;
                } else {
                    echo "Error uploading the image.";
                }
            } else {
                echo "No image uploaded or error with the image.";
            }
            
 
            self::$author_id = $_SESSION['user']['id'];
    
            $article = [                
                'title' => self::$title,          
                'slug' => self::$slug,            
                'content' => self::$content,      
                'category_id' => self::$category_id, 
                'featured_image' => self::$featured_image,        
                'author_id' => self::$author_id,  
            ];
            CRUD::insert('articles', $article);

            $lastArticle = self::getLastArticle();
            $articleId = $lastArticle[0]['id'];

            if (isset($_POST['tag_id']) && !empty($_POST['tag_id'])) {
                foreach ($_POST['tag_id'] as $tagId) {
                    $tagRelationship = [
                        'article_id' => $articleId,
                        'tag_id' => $tagId
                    ];
                    CRUD::insert('article_tags', $tagRelationship);
                }
            }
            header("Location: ../View/pages/ArticleTable.php");
        }
    }
    public static function uploadImage($file) {
        $uploadDirectory = '../uploads/';
        
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true); 
        }
    
        if (isset($file) && $file['error'] === 0) {
            $imageFileName = basename($file['name']);
            $imageFilePath = $uploadDirectory . $imageFileName;
    
            if (move_uploaded_file($file['tmp_name'], $imageFilePath)) {
                return $imageFilePath; 
            } else {
                echo "Error uploading the image.";
                return ''; 
            }
        } else {
            echo "No file uploaded or error in file.";
            return ''; 
        }
    }
    
    public static function updateArticle(){
        self::$title = $_POST['title'];
        self::$content = $_POST['content'];
        self::$status = $_POST['status'];
        self::$category_id = $_POST['category_id'];
        self::$scheduled_date = $_POST['scheduled_date'];
        if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] === 0) {
            self::$featured_image = self::uploadImage($_FILES['featured_image']);
        } else {
            self::$featured_image = $_POST['current_featured_image'] ?? ''; 
        }
    
        $article = [
            'title' => self::$title,
            'content' => self::$content,
            'status' => self::$status,
            'category_id' => self::$category_id,
            'scheduled_date' => self::$scheduled_date,
            'featured_image' => self::$featured_image
        ];
        CRUD::update('articles', $article, 'id=?', [$_POST['id']]);

        if (isset($_POST['tag_id']) && !empty($_POST['tag_id'])) {
            CRUD::delete('article_tags', 'article_id=?', [$_POST['id']]);
    
            foreach ($_POST['tag_id'] as $tagId) {
                $articleTag = [
                    'article_id' => $_POST['id'],
                    'tag_id' => $tagId
                ];
                CRUD::insert('article_tags', $articleTag);
            }
        }
        header("Location: ../View/pages/ArticleTable.php");
    }

    public static function updateArticleDraft(){
        if($_GET['accepted']==='true'){
            self::$status = 'published';
        }else if($_GET['accepted']==='false'){
            self::$status = 'scheduled';
        }
        
    
        $article = [
            
            'status' => self::$status
        ];
        CRUD::update('articles', $article, 'id=?', [$_GET['id']]);
        header("Location: ../View/pages/ArticleTable.php");
    }
    
    public static function deleteArticle(){
        if (isset($_GET['id'])) {
            CRUD::delete('articles', 'id=?', [$_GET['id']]);
            header("Location: ../View/pages/ArticleTable.php");
        }
    }
    
    //statistique -------------------------------
    public static function get_top_articles(){
        return CRUD::getTopArticles();
    }

}


if (isset($_GET['function'])&& $_GET['function'] === 'add') {

    Article::addArticle();

}else if (isset($_GET['function'])&& $_GET['function'] === 'update') {

    Article::updateArticle();

}else if (isset($_GET['function'])&& $_GET['function'] === 'delete') {

    Article::deleteArticle();

}else if (isset($_GET['function'])&& $_GET['function'] === 'draft') {

    Article::updateArticleDraft();

}


?>

