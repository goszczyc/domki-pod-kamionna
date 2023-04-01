import post_booking from "../post-booking";
import datePickers from "./createCallendars";
import send_email from "../sendEmail";
import {bookingModalContnet, bookingModalShow} from "../bookingModal";

const handleForm = () => {
  const form = document.querySelector("#booking-form");
  if (!form) return;

  let bookParams = new URLSearchParams(window.location.search);
  let initialData = {
    id: bookParams.get("id"),
    house: bookParams.get('house'),
    from: bookParams.get("from"),
    to: bookParams.get("to"),
    guests: bookParams.get("guests"),
  };
  let initialDates = [initialData.from, initialData.to];
  // Fields
  const house = document.querySelector("#house-selected");
  const date = document.querySelector("#reservation-bar-callendar");
  const guests = document.querySelector("#guests-number");
  const name = document.querySelector("#first-name");
  const sName = document.querySelector("#last-name");
  const phone = document.querySelector("#phone");
  const email = document.querySelector("#email");
  const info = document.querySelector("#info");
  const accept = document.querySelector("#acceptance");

  // Initial Data From Url
  // if((house.innerText != '') && (house.))
  house.innerText = initialData["house"];
  house.dataset.houseId = initialData["id"];
  guests.value = initialData["guests"];

  datePickers(initialDates);

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const checkedFields = [
      validateHouse(house),
      validateText(name),
      validateText(sName),
      validateText(info, false),
      validateDate(date),
      validatePhone(phone),
      validateEmail(email),
      validateAccept(accept),
      validateGuests(guests),
    ];

    let test = handleValidation(checkedFields);

    if(test) {
      bookingModalShow();
      const dateRange = date.value.split(' do ');
      const data = {
        object: house.dataset.houseId,
        from: dateRange[0],
        to: dateRange[1],
        name: name.value,
        sname: sName.value,
        email: email.value,
        tel: phone.value,
        info: info.value
      }
      post_booking(data).then(
        async () => {
          let isBooked = await send_email(data);
          if (isBooked) bookingModalContnet('success');
          else bookingModalContnet('error');
        }
      )
    }
  });
  function validateHouse(input) {
    const id = parseInt(input.dataset.houseId);
    if (id == "") {
      return {
        validation: false,
        input: input.parentElement,
        msg: "Wybierz domek",
      };
    }
    return {
      validation: true
    }

  }
  function validateText(input, isRequired = true) {
    const regExp = /^$|[a-zA-Z]/;
    const value = input.value;
    if (isRequired) {
      if (value == "")
        return {
          validation: false,
          input: input,
          msg: "Pole wymagane",
        };
    }

    if (regExp.test(value)) {
      return {
        validation: true,
        msg: "All good",
      };
    }

    return {
      validation: false,
      input: input,
      msg: "Pole zawiera niedzwolone znaki",
    };
  }
  function validateDate(input) {
    let date = input.value.split(" do ");
    if (date.length != 2) {
      return {
        validation: false,
        input: input,
        msg: "Wybierz pełną datę pobytu",
      };
    }
    return {
      validation: true,
    };
  }
  function validateEmail(input) {
    let emailExp = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
    let email = input.value;
    if (email == "")
      return {
        validation: false,
        input: input,
        msg: "Pole wymagane",
      };
    if (!emailExp.test(email)) {
      return {
        validation: false,
        input: input,
        msg: "Nieprawidłowy adres e-mail",
      };
    }
    return {
      validation: true,
    };
  }
  function validatePhone(input) {
    let phoneExp = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
    let phone = input.value;
    if(phone == '') return {
      validation: true
    }

    if (!phoneExp.test(phone)) {
      return {
        validation: false,
        input: input,
        msg: "Nieprawidłowy nr telefonu",
      };
    }
    return {
      validation: true,
    };
  }
  function validateAccept(input) {
    if (input.checked) {
      return {
        validation: true,
      };
    }
    return {
      validation: false,
      input: input,
      msg: "Wymagane jest zaakceptowanie warunków",
    };
  }
  function validateGuests(input) {
    let guests = parseInt(input.value);
    if (guests > 0 && guests < 9)
      return {
        validation: true,
      };
    return {
      validation: false,
      input: input,
      msg: "Nieprawidłowa liczba gości",
    };
  }
  // Pass array of valiate functions
  function handleValidation(checkedFields) {
    let isValid = true;

    const errorMsgs = document.querySelectorAll(".error-msg");
    if (errorMsgs) {
      errorMsgs.forEach((error) => {
        error.remove();
      });
    }

    checkedFields.forEach((checkedField) => {
      let validation = checkedField.validation;
      if (!validation) {
        isValid = false;
        let errorMsg = document.createElement("P");
        errorMsg.setAttribute("class", "error-msg");
        errorMsg.innerText = checkedField.msg;
        checkedField.input.parentElement.appendChild(errorMsg);
      }
    });

    return isValid;
  }
};

export default handleForm;
