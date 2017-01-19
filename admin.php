<?php
require("../config.php");

session_start();

$action = isset($_GET['action']) ? $_GET['action'] : "";
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";

if( $action != login && $action != "logout" && !$username){
  login();
  exit;
}

switch ( $action ) {
  case 'login':
    login();
    break;
  case 'logout':
    logout();
    break;
  case 'newArticle':
    newArticle();
    break;
  case 'editArticle':
    editArticle();
    break;
  case 'deleteArticle':
    deleteArticle();
    break;
  default:
    listArticles();
}

function login(){

  $results = array();
  $results['title'] = "Login";

  if(isset( $_POST['login'])){
    if($_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD){
      $_SESSION['username'] == ADMIN_USERNAME;
      require( TEMPLATE_PATH . "/cs_temp.php" );
      // print("SUCCESS!");
      // header( "Location: admin.php" );
    }
    else{
      print("FAILURE!");
      header( "Location: index.php" );
    }
  }
  else{
    print("FAILURE!");
    header( "Location: index.php" );
  }

}
 ?>
