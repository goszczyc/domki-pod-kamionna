import flatpickr from "flatpickr";
import { Polish } from "flatpickr/dist/l10n/pl";
import fetch_bookings from "../fetch-bookings";

const datePickers = async (initialDates = []) => {
  let house = document.querySelector("#house-selected");
  if (!house) return;
  let houseId = house.dataset.houseId;
  if (!houseId) return;
  let bookedDates = await fetch_bookings(houseId);
  if (bookedDates.err) bookedDates = [];
  const disabledDatePicker = document.querySelector(".disabled");
  if (disabledDatePicker) disabledDatePicker.classList.remove("disabled");

  createPicker(bookedDates);

  function createPicker(bookedDates) {
    let callendarBar = document.querySelector("#reservation-bar-callendar");
    let callendarHouse = document.querySelector("#reservation-callendar");

    let pickDates;
    let pickDatesBar;

    if(callendarHouse) pickDates = flatpickr("#reservation-callendar", {
      mode: "range",
      inline: true,
      dateFormat: "d.m.Y",
      minDate: "today",
      locale: Polish,
      monthSelectorType: "static",
      disable: bookedDates,
      defaultDate: initialDates,
      onValueUpdate: function (selectedDates, dateStr) {
        if (callendarBar) {
          let range = dateStr.split(" do ");
          pickDatesBar.setDate(range);
        }
      },
    });

    if(callendarBar) pickDatesBar = flatpickr("#reservation-bar-callendar", {
      mode: "range",
      dateFormat: "d.m.Y",
      minDate: "today",
      locale: Polish,
      monthSelectorType: "static",
      disable: bookedDates,
      defaultDate: initialDates,
      onValueUpdate: function (selectedDates, dateStr) {
        if (callendarHouse) {
          let range = dateStr.split(" do ");
          pickDates.setDate(range);
        }
      },
    });
  }
};
export default datePickers;
