<?php
/* Template Name: Rezerwacja */

get_header();


$args = array(
    'post_type' => 'houses',
);

$homes = new WP_Query($args);

?>

<main class="main">

    <div class="container" style="display: flex; justify-content: center; font-size:2rem;">
    </div>
    <form id="booking-form">

        <div class="container">
            <div class="row justify-content-center">
                <?php
                if ($reservation_bar = get_field('reservation_bar', 'options')) :
                    $house_heading = $reservation_bar['house_heading'];
                    $date_heading = $reservation_bar['date_heading'];
                    $guests_heading = $reservation_bar['guests_heading'];
                    isset($_GET['id']) && !empty($_GET['id']) ? $selected = true : $selected = false;
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
                    </div>
                <?php endif; ?>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                    <div class="row">
                        <input type="hidden" name="date-from">
                        <div class="contact-form__group col-12 col-xs-6"><input type="text" name="first-name" id="first-name" placeholder="Imię*" class="contact-form__input"></div>
                        <div class="contact-form__group col-12 col-xs-6"><input type="text" name="last-name" id="last-name" placeholder="Nazwisko*" class="contact-form__input"></div>
                        <div class="contact-form__group col-12 col-xs-6"><input type="tel" name="phone" id="phone" placeholder="Numer telefonu*" class="contact-form__input"></div>
                        <div class="contact-form__group col-12 col-xs-6"><input type="email" name="email" id="email" placeholder="Adres e-mail*" class="contact-form__input"></div>
                        <div class="contact-form__group contact-form__group--message col-12"><textarea name="info" id="info" class="contact-form__input contact-form__input--message" placeholder="Dodatkowe informacje"></textarea></div>
                        <div class="contact-form__group contact-form__group--terms col-12">
                            <label tabindex="1">
                                <input type="checkbox" name="acceptance" id="acceptance" class="contact-form__acceptance">
                                <span>Zgłaszając swoją kandydaturę wyrażam zgodę na przetwarzanie moich danych osobowych
                                    przez Everywhere z siedzibą w Krakowie (30-000), ul. Złoty Róg (dalej:
                                    „Everywhere”), udostępnionych w złożonych przeze mnie dokumentach dla potrzeb
                                    niezbędnych do realizacji procesu rekrutacji aktualnej i przyszłych, zgodnie z art.6
                                    ust.1 lit. a ogólnego rozporządzenia o ochronie danych osobowych z dnia 27 kwietnia
                                    2016 r. (Dz. Urz. UE L 119 z 04.05.2016). Zapoznałem/zapoznałam się z klauzulą
                                    informacyjną. Jestem świadom/świadoma, iż moja zgoda może być odwołana w każdym
                                    czasie poprzez wysłanie maila na adres info@everywhere, co skutkować będzie
                                    usunięciem moich danych osobowych przez Everywhere.</span>
                            </label>
                            <div class="contact-form__group contact-form__group--submit col-12">
                                <button type="submit" id="submit-reservation" class="btn btn--primary">

                                    Zarezerwuj
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php get_template_part('/components/bookingModal') ?>

</main>

<?php get_footer(); ?>