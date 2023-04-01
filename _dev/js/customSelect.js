import datePickers from "./booking/createCallendars";
import bookingValidation from "./bookingValidation";


const customSelect = () => {
  const optionsContainer = document.querySelector(".custom-select__options");
  const selectedOption = document.querySelector(".custom-select__selected");
  const options = document.querySelectorAll(".custom-select__option");

  const activeClass = "custom-select__options--active";
  const selectedClass = "custom-select__option--selected";

  if (selectedOption) {
    selectedOption.addEventListener("click", (e) => {
      e.preventDefault();
      optionsContainer.classList.toggle(activeClass);
      selectedOption.classList.toggle("custom-select__selected--active");
    });
    options.forEach((option) => {
      option.addEventListener("click", (event) => {
        event.preventDefault();
        const selected = event.target;
        const dateInput = document.querySelector("#reservation-bar-callendar");
        dateInput.value = "";
        if (!optionsContainer.classList.contains(activeClass)) return;
        if (selectedOption.innerText === selected.innerText) return;
        selectedOption.classList.toggle("custom-select__selected--active");

        const current = document.querySelector(selectedClass);

        if (current) current.classList.remove(selectedClass);
        selected.classList.add(selectedClass);
        selectedOption.innerText = selected.innerText;
        selectedOption.dataset.houseId = selected.dataset.houseId;
        optionsContainer.classList.remove(activeClass);
        datePickers();
        bookingValidation();
      });
    });
  }
};

export default customSelect;
