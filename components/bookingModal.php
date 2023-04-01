<div id="reservationModal" class="modal">
    <div class="modal__content">
        <span class="loader"></span>
        <div class="info__success">
            <div class="modal__icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24">
                    <path d=" M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11
                    4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm7 7.457l-9.005 9.565-4.995-5.865.761-.649
                    4.271 5.016 8.24-8.752.728.685z" />
                </svg>
            </div>
            <div class="modal__title">
                Dziękujemy!
            </div>
            <div class="modal__text">
                Twoja rezerwacja wpadła do naszego systemu. Za niedługo skontaktujemy się z Tobą!
            </div>
            <a class="modal__btn btn btn--primary" href="<?php echo get_home_url() ?>">Wróć na główną</a>
        </div>
        <div class="info__error">
            <div class="modal__icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24">
                    <path
                        d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm-.019 14c1.842.005 3.613.791 5.117 2.224l-.663.748c-1.323-1.27-2.866-1.968-4.456-1.972h-.013c-1.568 0-3.092.677-4.4 1.914l-.664-.748c1.491-1.4 3.243-2.166 5.064-2.166h.015zm-3.494-6.5c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1zm7.013 0c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1z" />
                </svg>
            </div>
            <div class="modal__title">
                Rezerwacja się nie powiodła
            </div>
            <div class="modal__text">
                Nie udało się nam zarezerwować wybrane dane. Odśwież stronę i spróbuj jeszcze raz.
            </div>
            <?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
            <a class="modal__btn btn btn--primary" href="<?php echo $actual_link ?>">Odśwież stronę</a>
        </div>
    </div>
</div>