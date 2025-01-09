<?php
namespace App;

use App\CRUD;
use App\Article;
require_once dirname(__DIR__) . './vendor/autoload.php'; 


class User{
   protected $username ;
   protected $email ;
   protected $password ;
   protected $bio ;
   protected $profile_picture_url;
   protected $role ;
    

   public static function getAllUsers(){
      $users =CRUD::select('users');
      return $users;
  
  }
  public static function getAuteurs(){
   $users =CRUD::select('users','*','role=?',['auteur']);
   return $users;

}
public static function getUser($id){
   $users =CRUD::select('users', '*', 'id = ?', [$id]);;
   return $users;

}

public static function getCount(){
      $users =CRUD::select('users','count(*) as count');
      
          echo($users[0]['count']);
          
     
  }
public static function addUser() {
   if (isset($_POST['username'], $_POST['email'], $_POST['password_hash'], $_POST['bio'], $_POST['profile_picture_url'])) {
       $username = $_POST['username'];
       $email = $_POST['email'];
       $password_hash = password_hash($_POST['password_hash'], PASSWORD_DEFAULT); 
       $bio = $_POST['bio'];
       $profile_picture_url = $_POST['profile_picture_url'];

       $user = [
           'username' => $username,
           'email' => $email,
           'password_hash' => $password_hash,
           'bio' => $bio,
           'profile_picture_url' => $profile_picture_url,
       ];

       CRUD::insert('users', $user);

   }
}


public static function updateUser(){
   if (isset($_POST['username'], $_POST['email'], $_POST['password_hash'], $_POST['bio'], $_POST['profile_picture_url'], $_POST['role'])) {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password_hash = password_hash($_POST['password_hash'], PASSWORD_DEFAULT); 
      $bio = $_POST['bio'];
      $profile_picture_url = $_POST['profile_picture_url'];
      $role = $_POST['role'];

      $user = [
          'username' => $username,
          'email' => $email,
          'password_hash' => $password_hash,
          'bio' => $bio,
          'profile_picture_url' => $profile_picture_url,
          'role' => $role
      ];
       CRUD::update('users', $user,'id=?',[$_POST['id']]);
   }
}
public static function deleteUser(){
   if (isset($_GET['id'])) {

      CRUD::delete('articles','author_id=?',[$_GET['id']]);
       CRUD::delete('users','id=?',[$_GET['id']]);
   }
}
//statictique -------------------------------
public static function get_top_users(){
   return CRUD::getTopUsers();
}

//log in---------------------------
public static function logIn() {
   if (isset( $_POST['email'] , $_POST['password_hash'])) {

       $email = $_POST['email'];
       $password_hash = $_POST['password_hash']; 
      

      $users=self::getAllUsers();
      foreach ($users as $user) {

         if($user['email']==$email && password_verify($password_hash, $user['password_hash'])){
            session_start();
            $_SESSION['auth'] =true;
            $_SESSION['user'] = [
               'id' => $user['id'],
               'username' => $user['username'],
               'role' => $user['role']
           ];
            return $user;
         }else if(($user['email']!==$email || !password_verify($password_hash, $user['password_hash'])) ){
            continue;
         }else{
            return null;
         }
      }


   }
}
}



if (isset($_GET['function'])&& $_GET['function'] === 'add') {

   User::addUser();
   header("Location: ../View/pages/UserTable.php");

}else if (isset($_GET['function'])&& $_GET['function'] === 'update') {

   User::updateUser();
   header("Location: ../View/pages/UserTable.php");

}else if (isset($_GET['function'])&& $_GET['function'] === 'delete') {

   User::deleteUser();
   header("Location: ../View/pages/UserTable.php");

}else if (isset($_GET['function'])&& $_GET['function'] === 'registre') {

   User::addUser();
   
   header("Location: ../View/pages/login.php");

}else if (isset($_GET['function'])&& $_GET['function'] === 'logIn') {

   $user=User::logIn();
   if($user['role']===null){
      
      header("Location: ../View/pages/login.php?logIn=erreur");
   }else if($user['role']==='user'){
      header("Location: ../View/pages/scrolingArticle.php");
   }else if($user['role']==='auteur'){
      header("Location: ../View/pages/ArticleTable.php");
   }else if($user['role']==='admin'){
      header("Location: ../index.php");
   }
}

?>


