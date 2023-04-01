<section role="banner" class="banner container container--full-hd">
    <?php if ($banner_bg = get_field('banner_bg')) : ?>
        <div class="banner__content" style="background-image: url('<?= esc_url($banner_bg); ?>');">
            <?php if ($banner_heading = get_field('banner_heading')) : ?>
                <div class="banner__heading">
                    <?= $banner_heading; ?>
                </div>
                <button class="banner__scroll">
                    <img src="<?= get_template_directory_uri(); ?>/dist/images/scroll.svg" alt="">
                </button>
            <?php endif; ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <?php
                if ($reservation_bar = get_field('reservation_bar', 'options')) :
                    $house_heading = $reservation_bar['house_heading'];
                    $date_heading = $reservation_bar['date_heading'];
                    $guests_heading = $reservation_bar['guests_heading'];
                    isset($_GET['id']) && !empty($_GET['id']) ? $selected = true : $selected = false;
                    $args = array(
                        'post_type' => 'houses',
                    );

                    $homes = new WP_Query($args);

                ?>
                    <div class="reservation-bar">
                        <div class="reservation-bar__group">
                            <h3 class="reservation-bar__heading">
                                <?= $house_heading; ?>
                            </h3>
                            <div class="reservation-bar__text">
                                <?php if ($homes->have_posts()) : ?>
                                    <div class="custom-select">
                                        <?php if ($selected) : ?>
                                            <button id="house-selected" class="custom-select__selected" data-house-id="<?= get_the_ID(); ?>"><?= get_the_title(); ?></button>
                                        <?php else : ?>
                                            <button id="house-selected" class="custom-select__selected" data-house-id>Wybierz</button>
                                        <?php endif; ?>
                                        <div class="custom-select__options">
                                            <?php while ($homes->have_posts()) :
                                                $homes->the_post(); ?>
                                                <button class="custom-select__option" data-house-id="<?= get_the_ID(); ?>">
                                                    <?= get_the_title(); ?>
                                                </button>
                                            <?php endwhile; ?>
                                        </div>

                                    </div>
                                <?php reset_query();
                                endif; ?>
                            </div>

                        </div>
                        <div class="reservation-bar__group disabled" data-book_dates>
                            <h3 class="reservation-bar__heading">
                                <?= $date_heading; ?>
                            </h3>
                            <input type="text" class="reservation-bar__text reservation-bar__text--date" id="reservation-bar-callendar" placeholder="Wybierz datę">
                        </div>
                        <div class="reservation-bar__group">
                            <h3 class="reservation-bar__heading">
                                <?= $guests_heading; ?>
                            </h3>
                            <div class="reservation-bar__text reservation-bar__guests">
                                <button data-subtract class="reservation-bar__guests-btn reservation-bar__guests-btn--sub">-</button>
                                <input type="number" id="guests-number" class="reservation-bar__guests-number" value="1">
                                <button data-add class="reservation-bar__guests-btn  reservation-bar__guests-btn--add">+</button>
                            </div>
                        </div>
                        <div class="reservation-bar__group">
                            <a id="bar-booking" class="btn btn--primary" href="<?php echo get_permalink(497); ?>">
                                Zarezerwuj teraz
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</section>