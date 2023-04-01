export default function bookingValidation(){
    let bookingHouse = document.querySelector('[data-book_house]');
    let bookingDates = document.querySelector('[data-book_dates');
    if (!bookingHouse || !bookingDates) return;
    
    bookingDates.classList.remove('disabled');
    if (bookingHouse.getAttribute('data-house-id').length<1) bookingDates.classList.add('disabled');
  }