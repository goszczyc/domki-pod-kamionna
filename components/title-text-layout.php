<section class="title-text">
  <?php $is_columns = get_sub_field('columns'); ?>
  <?php $is_bar = get_sub_field('is_bar'); ?>
  <div class="container">
    <div class="row">

      <?php if ($title_text_heading = get_sub_field('title_text_heading')) : ?>
        <div class="title-text__title <?php if($is_bar) echo 'title-text__title--bar'; ?> col-12 col-md-10 offset-md-1">
          <?= $title_text_heading; ?>
        </div>
      <?php endif; ?>

      <?php if ($is_columns) : ?>
        <div class="title-text__text col-12 col-xs-10 offset-xs-1 col-sm-6 offset-sm-0 col-md-5 offset-md-1 col-lg-4 offset-lg-2">
          <?php if ($title_text_left = get_sub_field('title_text_left')) echo $title_text_left; ?>
        </div>
        <div class="title-text__text col-12 col-xs-10 col-sm-6 col-md-5 col-lg-4 offset-lg-1">
          <?php if ($title_text_right = get_sub_field('title_text_right')) echo $title_text_right; ?>
        </div>
      <?php else : ?>
        <div class="title-text__text col-12 col-xs-10 offset-xs-1 col-md-9 col-lg-8 offset-lg-2">
          <?php if ($text_center = get_sub_field('text_center')) echo $text_center; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>