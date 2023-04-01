<footer class="footer container">
  <div class="row footer__top">
    <div class="footer__about col-12 col-xs-8 col-sm-7 col-md-3 col-lg-3">
      <?php if ($footer_about = get_field('footer_about', 'options')) : ?>

        <h3 class="footer__heading"><?= $footer_about['heading'];  ?></h3>

        <p class="footer__text"><?= $footer_about['text']; ?></p>

        <?php $footer_ask = $footer_about['link']; ?>
        <a href="<?= esc_url($footer_ask['url']); ?>" class="btn btn--primary">
          <?= $footer_ask['title']; ?>
        </a>
      <?php endif; ?>

    </div>
    <div class="footer__menu col-12 col-xs-4 offset-sm-0 col-md-2 offset-lg-1 col-lg-2">
      <h3 class="footer__heading"><?= get_field('footer_menu_heading', 'options'); ?></h3>

      <?php
      wp_nav_menu($args = array(
        'menu' => 4,
        'container' => false,
        'menu_class' => 'footer__menu-items',
        'menu_id' => 'main-menu'
      ));
      ?>

    </div>
    <div class="footer__menu col-12 col-xs-8 col-sm-7 col-md-4 col-lg-4 offset-lg-0">

      <h3 class="footer__heading"><?= get_field('footer_contact_heading', 'options'); ?></h3>

      <?php if ($contact_email = get_field('contact_email', 'options')) : ?>

        <a href="mailto: <?= $contact_email; ?>" class="footer__text footer__text--link">
          <?= $contact_email; ?>
        </a>

      <?php endif; ?>

      <?php if ($contact_phone = get_field('contact_phone', 'options')) : ?>

        <a href="tel: <?= $contact_phone; ?>" class="footer__text footer__text--link">
          <?= $contact_phone; ?>
        </a>

      <?php endif; ?>

      <?php if (have_rows('social_media', 'options')) : ?>

        <div class="footer__social">

          <?php
          while (have_rows('social_media', 'options')) : the_row();
            if (($social_url = get_sub_field('social_url')) && ($social_icon = get_sub_field('social_icon'))) :
          ?>

              <a href="<?= $social_url; ?>" class="footer__social-link">
                <?= wp_get_attachment_image($social_icon, 'full', '', ['class' => 'footer__social-icon footer__social-icon--dark']); ?>
              </a>

          <?php
            endif;
          endwhile;
          ?>

        </div>

      <?php endif; ?>

    </div>
    <div class="footer__menu col-12 col-xs-4 offset-xs-0 col-md-3 col-lg-2">
      <h3 class="footer__heading"><?= get_field('footer_address_heading', 'options'); ?></h3>

      <?php if ($footer_address = get_field('footer_address', 'options')) : ?>
        <div class="footer__text">
          <?= $footer_address; ?>
        </div>
      <?php endif; ?>
      <?php if ($footer_route = get_field('footer_route', 'options')) : ?>
        <a href="<?= esc_url($footer_route['url']); ?>" class="footer__text footer__text--route"><?= $footer_route['title']; ?></a>
      <?php endif; ?>

    </div>
  </div>
  <div class="row footer__bottom">
    <?php if ($privacy_link = get_field('privacy_link', 'options')) : ?>
      <a href="<?= esc_url($privacy_link['url']); ?>" class="footer__privacy"><?= $privacy_link['title']; ?></a>
    <?php endif; ?>
    <div class="d-flex align-items-center">
      <div class="footer__copy">&copy; <?= date('Y'); ?> Domki pod Kamionną Wszelkie prawa zastrzeżone<a href="" class="footer__everywhere"></a></div>
      <a href="https://everywhere.pl" class="footer__everywhere"><img src="<?= get_template_directory_uri(); ?>/dist/images/everywhere-logo.svg" alt=""></a>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

<!-- Cookies -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/cookies/divante.cookies.min.js">
</script>
<script>
  window.jQuery.cookie || document.write(
    '<script src="<?php echo get_template_directory_uri(); ?>/cookies/jquery.cookie.min.js"><\/script>')
</script>
<script>
  jQuery(function($) {
    $.divanteCookies.render({
      privacyPolicy: true,
    });
  });
</script>

</body>

</html>