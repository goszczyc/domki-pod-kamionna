import mobileMenu from "./menu";
import { attractionsSlider, iconsSlider, slidersFromLayouts } from "./sliders";
import datePickers from "./booking/createCallendars";
import guestCounter from "./booking/guestCounter";
import addUrlParam from "./booking/reservation-bar";
import handleForm from "./booking/reservation-form";
import customSelect from "./customSelect";
import paralaxScroll from "./paralaxScroll";
import scrollBanner from "./scroll-banner";
import bookingValidation from "./bookingValidation";
import pickHouse from "./pickHouse";
import contactMap from "./map/map_handle";
import gallery from "./gallery";
import comments from "./comments";


document.addEventListener("DOMContentLoaded", function () {
  comments();
  mobileMenu();
  pickHouse();
  attractionsSlider();
  slidersFromLayouts();
  toggleHeaderScrolled();
  guestCounter();
  datePickers();
  addUrlParam();
  handleForm();
  customSelect();
  paralaxScroll();
  scrollBanner();
  bookingValidation();
  contactMap();
  iconsSlider();
  gallery();
});

function toggleHeaderScrolled() {
  const header = document.querySelector(".header");
  if (pageYOffset >= 2) {
    header.classList.add("header--scrolled");
  } else {
    header.classList.remove("header--scrolled");
  }

  window.onscroll = function () {
    if (pageYOffset >= 2) {
      header.classList.add("header--scrolled");
    } else {
      header.classList.remove("header--scrolled");
    }
  };
}

