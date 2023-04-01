<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri(); ?>/dist/images/favico/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri(); ?>/dist/images/favico/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri(); ?>/dist/images/favico/favicon-16x16.png">
  <link rel="manifest" href="<?= get_template_directory_uri(); ?>/dist/images/favico/site.webmanifest">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <title><?php echo wp_title(); ?></title>
  <?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>


  <header class="header container container--full-hd">
    <?php if ($logo = get_field('logo', 'options')) : ?>

      <a href="<?= home_url(); ?>" class="header__logo header__logo--dark"><?= wp_get_attachment_image($logo, 'full'); ?></a>

    <?php endif; ?>

    <nav class="header__nav">

      <div class="header__menus">
        <?php
        wp_nav_menu($args = array(
          'menu' => 'nav-top',
          'container' => false,
          'menu_class' => 'header__main-menu',
          'menu_id' => 'main-menu'
        ));
        ?>

        <?php if (have_rows('social_media', 'options')) : ?>

          <div class="header__social">

            <?php
            while (have_rows('social_media', 'options')) : the_row();
              if (($social_url = get_sub_field('social_url')) && ($social_icon = get_sub_field('social_icon'))) :
            ?>

                <a href="<?= $social_url; ?>" class="header__social-link">
                  <?= wp_get_attachment_image($social_icon, 'full', '', ['class' => 'header__social-icon header__social-icon--dark']); ?>
                </a>

            <?php
              endif;
            endwhile;
            ?>

          </div>

        <?php endif; ?>

        <?php if ($phone = get_field('phone', 'options')) : ?>

          <div>
            <span class="call-us">Zadzwoń do nas</span>
            <a href="tel: <?= str_replace(' ', '', $phone); ?>" class="haeder__phone menu-item"><?= $phone; ?></a>
          </div>

        <?php endif; ?>
      </div>
      <a href="/zarezerwuj-domek/?id=&house=Wybierz+domek&from=&to=&guests=1" class="header__book btn btn--book">Zarezerwuj teraz</a>

      <button class="header__burger">
        <div class="header__burger-bar"></div>
      </button>

    </nav>
  </header>