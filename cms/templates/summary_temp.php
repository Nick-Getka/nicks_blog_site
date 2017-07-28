<?php $date = (new DateTime($post->date))->format('m/d/y'); ?>
<div class="row-fluid">
  <div class="col-xs-11 col-xs-offset-1 sum_row">
    <div class="sum container-fluid">
      <div class="row-fluid">
        <div class="sum col-xs-12">
          <a href=".?action=viewArticle&amp;articleId=<?php echo $post->id; ?>" class="sum_title"> <?php echo htmlspecialchars( $post->title ); ?></a>
        </div>
      </div>
      <div class="row-fluid">
        <div class="sum col-xs-12">
          <p class="sum_date"><?php echo $date; ?></p>
        </div>
      </div>
      <div class="row-fluid">
        <div class="sum col-xs-12">
          <p class="sum_text"><?php echo htmlspecialchars( $post->preview ); ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
