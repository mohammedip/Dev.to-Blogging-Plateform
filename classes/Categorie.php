<?php
namespace App;

use App\CRUD;

require_once dirname(__DIR__) . './vendor/autoload.php'; 
class Categorie {

    private int $id;
    private string $name;
    

    public static function getAllCategories(){
        $categories =CRUD::select('categories');
        return $categories;
    
    }
    public static function getCountCategories(){
        $categories =CRUD::select('categories','count(*) as count');
        
            echo($categories[0]['count']);
            
    }

    public static function getCategorie($id){
        $categories =CRUD::select('categories', 'name', 'id = ?', [$id]);;
        return $categories;
    
    }
    public static function addCategorie(){
        if (isset($_POST['name'])) {
            $categoryName = $_POST['name'];
            $category = [
                'name' => $categoryName,
            ];
            CRUD::insert('categories', $category);
            header("Location: ../View/pages/CategorieTable.php");
        }
    }
    public static function updateCategorie(){
        if (isset($_POST['name'])) {
            $categoryName = $_POST['name'];
            $category = [
                'name' => $categoryName,
            ];
            CRUD::update('categories', $category,'id=?',[$_POST['id']]);
            header("Location: ../View/pages/CategorieTable.php");
        }
    }
    public static function deleteCategorie(){
        if (isset($_GET['id'])) {
            
            CRUD::delete('categories','id=?',[$_GET['id']]);
            header("Location: ../pages/CategorieTable.php");
           
        }
    }
}

if (isset($_GET['function'])&& $_GET['function'] === 'add') {

    Categorie::addCategorie();

}else if (isset($_GET['function'])&& $_GET['function'] === 'update') {

    Categorie::updateCategorie();

}else if (isset($_GET['function'])&& $_GET['function'] === 'delete') {

    Categorie::deleteCategorie();

}


?>

