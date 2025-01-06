<?php
namespace App;

use App\CRUD;

require_once dirname(__DIR__) . './vendor/autoload.php'; 
class Tag {


public static function getAllTags(){
    $tags =CRUD::select('tags');
    return $tags;

}
public static function getTag($id){
    $tags =CRUD::select('tags', 'name', 'id = ?', [$id]);;
    return $tags;

}
public static function getCountTags(){
    $tags =CRUD::select('tags','count(*) as count');
    echo($tags[0]['count']);  
   
}
public static function addTag(){
    if (isset($_POST['name'])) {
        $tagName = $_POST['name'];
        $tag = [
            'name' => $tagName,
        ];
        CRUD::insert('tags', $tag);
        header("Location: ../View/pages/TagTable.php");
    }
}
public static function updateTag(){
    if (isset($_POST['name'])) {
        $tagName = $_POST['name'];
        $tag = [
            'name' => $tagName,
        ];
        CRUD::update('tags', $tag,'id=?',[$_POST['id']]);
        header("Location: ../View/pages/TagTable.php");
    }
}
public static function deleteTag(){
    if (isset($_GET['id'])) {
        
        CRUD::delete('tags','id=?',[$_GET['id']]);
        header("Location: ../View/pages/TagTable.php");
    }
}

}


    if (isset($_GET['function'])&& $_GET['function'] === 'add') {

            Tag::addTag();
  
    }else if (isset($_GET['function'])&& $_GET['function'] === 'update') {

        Tag::updateTag();

}else if (isset($_GET['function'])&& $_GET['function'] === 'delete') {

    Tag::deleteTag();

}


?>



