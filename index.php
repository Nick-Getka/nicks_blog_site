<?php
  require("../conf.php");
  $action = isset( $_GET['action'] ) ? $_GET['action'] : "";

  error_reporting(E_ALL);
  ini_set('display_errors', TRUE);
  ini_set('display_startup_errors', TRUE);

  switch ( $action ) {
    case 'archive':
      archive();
      break;
    case 'viewArticle':
      viewArticle();
      break;
    case 'coming_soon':
      coming_soon();
      break;
    default:
      homepage();
  }

  function archive(){
    if ( !isset($_GET["type"]) || !$_GET["type"] ) {
      homepage();
      return;
    }
    $results = array();
    $results = (Post::getList($_GET["type"]));
    require( TEMPLATE_PATH . "/viewList.php" );
  }

  function viewArticle() {
    if ( !isset($_GET["articleId"]) || !$_GET["articleId"] ) {
      homepage();
      return;
    }
    $results = array();
    $results['article'] = Post::getById( (int)$_GET["articleId"] );



    if(is_null($results['article'])){
      require( TEMPLATE_PATH . "/coming_soon.php");
    }else{
      require( TEMPLATE_PATH . "/viewArticle.php" );
    }
  }

  function homepage() {
    $results = array();
    require( TEMPLATE_PATH . "/homepage.php" );
  }

  function coming_soon(){
    require( TEMPLATE_PATH . "/cs_temp.php" );
  }
?>
