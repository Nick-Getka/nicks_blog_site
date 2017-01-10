<?php include "head_temp.php" ?>
  <div id="post_list">
    <?php foreach ($results as $post){
      if($post){
        include "cms/templates/coming_soon.php";
      }else{
        include "cms/templates/summary_temp.php";
      }
    }?>
  </div>
<?php include "footer.php" ?>
