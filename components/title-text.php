<?php
$post_id = isset($args['post_id']) ? $args['post_id'] : '';
$read_more = isset($args['read_more']) ? $args['read_more'] : '';
$background = get_field('background_image');
$is_columns = get_field('columns', $post_id);
$is_bar = get_field('is_bar', $post_id);
?>

<section class="title-text" <?php if ($background) : ?>style="background-image: url('<?= esc_url($background); ?>');" <?php endif; ?>>

  <div class="container">
    <div class="row">
      <div class="col-12 col-md-10 offset-md-1">
        <?php
        if (function_exists('yoast_breadcrumb')) {
          yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">', '</p>');
        }
        ?>
      </div>
      <?php if ($title_text_heading = get_field('title_text_heading', $post_id)) : ?>
        <div class="title-text__title <?php if ($is_bar) echo 'title-text__title--bar'; ?> col-12 col-md-10 offset-md-1">
          <?= $title_text_heading; ?>
        </div>
      <?php endif; ?>

      <?php if ($is_columns) : ?>
        <div class="title-text__text col-12 col-xs-10 offset-xs-1 col-sm-6 offset-sm-0 col-md-5 offset-md-1 col-lg-4 offset-lg-2">
          <?php if ($title_text_left = get_field('title_text_left', $post_id)) echo $title_text_left; ?>
        </div>
        <div class="title-text__text col-12 col-xs-10 col-sm-6 col-md-5 col-lg-4 offset-lg-1">
          <?php if ($title_text_right = get_field('title_text_right', $post_id)) echo $title_text_right; ?>
        </div>
      <?php else : ?>
        <div class="title-text__text col-12 col-xs-10 offset-xs-1 col-md-9 col-lg-8 offset-lg-2">
          <?php if ($text_center = get_field('text_center', $post_id)) echo $text_center; ?>
          <?php if ($read_more) : ?>
            <div class="mt-4">
              <a class="link" href="<?= esc_url(get_permalink($post_id)); ?>">
                Czytaj więcej
              </a>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>