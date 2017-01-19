<?php
class Post{
  public static $id;
  public static $date;
  public static $content;
  public static $preview;
  public static $type;
  public static $title;

  public function __construct( $data=array() ){
    if(isset( $data['post_id'] )){
      $this->id=$data['post_id'];
    }
    if(isset( $data['post_date'] )){
      $this->date=$data['post_date'];
    }
    if(isset( $data['post_content'] )){
      $this->content=$data['post_content'];
    }
    if(isset( $data['post_preview'] )){
      $this->preview=$data['post_preview'];
    }
    if(isset( $data['post_type'] )){
      $this->type=$data['post_type'];
    }
    if(isset( $data['post_title'] )){
      $this->title=$data['post_title'];
    }
  }

  public function storeFormValues ( $params ) {

    $this->__construct( $params );

    if ( isset($params['post_date']) ) {
      $publicationDate = explode ( '-', $params['post_date'] );

      if ( count($publicationDate) == 3 ) {
        list ( $y, $m, $d ) = $publicationDate;
        $this->publicationDate = mktime ( 0, 0, 0, $m, $d, $y );
      }
    }
  }

  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM blog_schema.posts WHERE post_id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ':id', $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;

    if ( $row ) return new Post( $row );
  }

  public static function getByTitle( $title ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM blog_schema.posts WHERE post_title = :title";
    $st = $conn->prepare( $sql );
    $st->bindValue( ':title', $title, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;

    if ( $row ) return new Post( $row );
  }

  public static function getLatest(){
    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM blog_schema.posts ORDER BY post_id DESC LIMIT 1";
    $st = $conn->prepare( $sql );
    $st->execute();
    $row = $st->fetch();
    $conn = null;

    if ( $row ) return new Post($row);
    else return null;
  }

  public static function getList( $fetchType ){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "";
    if( $fetchType == "all"){
      $sql = "SELECT * FROM blog_schema.posts ORDER BY post_date";
    }
    else{
      $sql = "SELECT * FROM blog_schema.posts WHERE post_type = :type ORDER BY post_date";
    }

    $st = $conn->prepare( $sql );
    $st->bindValue( ':type', $fetchType, PDO::PARAM_STR );
    $st->execute();
    $list = array();

    while( $row = $st->fetch() ){
      $post = new Post( $row );
      $list[] = $post;
    }
    $conn = null;

    return $list;
  }

  public static function insert(){
    if(is_null($this->content)||is_null($this->preview)||is_null($this->title)||is_null($this->type)){
      trigger_error( "ERROR: Article is missing the artice, preview, type, or title" );
    }
    else{
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
      $sql = "INSERT INTO blog_schema.posts (post_date, post_content, post_preview, post_type, post_title) VALUES (FROM_UNIXTIME(:pubDate), :content, :preivew, :type, :title)";

      $st = $conn->prepare( $sql );
      $st->bindValue(":pubDate", date(), PDO::PARAM_INT );
      $st->bindValue(":content", $this->content, PDO::PARAM_STR);
      $st->bindValue(":preview", $this->preview, PDO::PARAM_STR);
      $st->bindValue(":type", $this->type, PDO::PARAM_STR);
      $st->bindValue(":title", $this->type, PDO::PARAM_STR);
      $str->execute();

      $conn = null;
    }
  }

  public static function update($targetTitle){
    trigger_error( "ERROR: Article is missing the artice, preview, type, or title" );
    if(is_null($this->content)||is_null($this->preview)||is_null($this->title)||is_null($this->type)){
    }
    else{
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
      $sql = "UPDATE blog_schema.posts SET post_date=:pubDate, post_content=:content, post_preview=:preview, post_type=:type, post_title=:title WHERE post_title = :title";

      $st = $conn->prepare( $sql );
      $st->bindValue(":pubDate", date(), PDO::PARAM_INT );
      $st->bindValue(":content", $this->content, PDO::PARAM_STR);
      $st->bindValue(":preview", $this->preview, PDO::PARAM_STR);
      $st->bindValue(":type", $this->type, PDO::PARAM_STR);
      $st->bindValue(":title", $this->type, PDO::PARAM_STR);
      $str->execute();

      $conn = null;
    }
  }

  public static function delete(){
    trigger_error( "ERROR: Article is missing the artice, preview, type, or title" );
    if(is_null($this->content)||is_null($this->preview)||is_null($this->title)||is_null($this->type)){
    }
    else{
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
      $sql = "DELETE FROM blog_schema.posts WHERE post_title = :title LIMIT 1";

      $st = $conn->prepare( $sql );
      $st->bindValue(":title", $this->type, PDO::PARAM_STR);
      $str->execute();

      $conn = null;
    }
  }
}
?>
