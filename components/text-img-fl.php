<?php if (($text = get_sub_field('text')) && ($image = get_sub_field('image'))) : ?>

  <div class="text-image text-image--fl grid-container">
    <div class="text-image__image">
      <?= wp_get_attachment_image($image, 'attraction-image'); ?>
    </div>
    <div class="text-image__text">
      <?= $text; ?>
      <?php if ($pdf_download = get_sub_field('pdf_button')) : ?>
        <a href="<?= esc_url($pdf_download['url']); ?>" class="text-image__pdf-download" download><img src="<?= get_template_directory_uri(); ?>/dist/images/pdf-logo.png" alt="pdf">Pobierz w formie .pdf<a>
          <?php endif; ?>
    </div>
  </div>

<?php endif; ?>