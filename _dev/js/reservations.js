import flatpickr from "flatpickr";
import { Polish } from "flatpickr/dist/l10n/pl";

const datePickers = () => {
  let i = 0;

  const pickDates = flatpickr("#reservation-callendar", {
    mode: "range",
    inline: true,
    dateFormat: "d.m.Y",
    minDate: "today",
    locale: Polish,
    monthSelectorType: 'static',
    onValueUpdate: function (selectedDates, dateStr) {
      let range = dateStr.split(" do ");
      // pickDatesBar.setDate(range);
    },
  });
  // const pickDatesBar = flatpickr("#bar-reservation-callendar", {
  //   mode: "range",
  //   inline: true,
  //   dateFormat: "d.m.Y",
  //   minDate: "today",
  //   locale: Polish,
  //   onValueUpdate: function (selectedDates, dateStr) {
  //     let range = dateStr.split(" do ");
  //     pickDates.setDate(range);
  //   },
  // });

};
export default datePickers;
