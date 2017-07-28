<?php
class Author{
  public $id;
  public $head;
  public $desc;
  public $email;

  public function __construct($data=array()){
    if(!empty($data['auth_id'])){
      $this->id=$data['auth_id'];
    }
    if(!empty($data['auth_head'])){
      $this->head=$data['auth_head'];
    }
    if(!empty($data['auth_desc'])){
      $this->desc=$data['auth_desc'];
    }
    if(!empty($data['auth_email'])){
      $this->email=$data['auth_email'];
    }
  }

  public static function fetch(){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM blog_schema.author WHERE auth_id = 1";
    $st = $conn->prepare( $sql );
    $st->execute();
    $row = $st->fetch();
    $conn = null;

    if($row) return new Author($row);
  }

  public static function getArray(){
    $auth = Author::fetch();

    $data = array();
    $data['id']=$auth->id;
    $data['head']=$auth->head;
    $data['desc']=$auth->desc;
    $data['email']=$auth->email;

    if($data) return $data;
  }
}
?>
