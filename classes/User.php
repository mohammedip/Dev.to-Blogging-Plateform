<?php
namespace App;

use App\CRUD;
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
   public static function getCount(){
      $users =CRUD::select('users','count(*) as count');
      
          echo($users[0]['count']);
          
     
  }
 

}

?>


