<?php include "cms/templates/head_temp.php" ?>

  <div class="row-fluid" id="homepage">
    <div class="col-*-*">
      <!--Retrieve Author data-->
      <?php
      $auth = Author::getArray();
      $latest = Post::getLatest();
      ?>
      <div class="row-fluid" >
        <div class="col-lg-10 col-lg-offset-1 hidden-sm hidden-xs">
          <div class="media-body snippet">
            <a class="pull-right" id="head_sect">
              <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($auth['head']).'" alt="Picture" class="img-circle img-responsive head">';?>
            </a>
            <p class="desc"><span class="welcome">Welcome...</span><br> &nbsp; &nbsp; &nbsp; <?php echo $auth['desc'];?></p>
          </div>
        </div>
        <div class="col-sm-12 col-xs-12 hidden-lg hidden-md">
          <div class="row-fluid">
            <div class ="col-sm-12 col-xs-12">
              <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($auth['head']).'" alt="Picture" class="img-circle img-responsive head">';?>
            </div>
          </div>
          <div class="row-fluid" id="small">
            <div class ="hidden-xs hidden-sm col-md-12 col-lg-12">
              <p class="desc"><span class="welcome">Welcome...</span><br><?php echo $auth['desc'];?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="col-xs-11 col-xs-offset-1" id="latest">
          <p>Latest Post</p>
        </div>
      </div>
      <?php
      if(is_null($latest)){
        include "cms/templates/coming_soon.php";
      }else{
        $post = $latest;
        include "cms/templates/summary_temp.php";
      }
      ?>
    </div>
  </div>

<?php include "cms/templates/footer.php" ?>
