export function bookingModalContnet(state) {
    let modal = document.querySelector('#reservationModal');
    if (!modal) return;
    modal.querySelector('.loader').remove();
    modal.querySelector('.modal__content').classList.add(state);
}

export function bookingModalShow(){
    let modal = document.querySelector('#reservationModal');
    if (!modal) return;
    modal.classList.add('show');
}