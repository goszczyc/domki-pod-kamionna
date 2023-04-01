const addUrlParam = () => {
  const button = document.querySelector("#bar-booking");
  if (!button) return;
  
  const house = document.querySelector("#house-selected");
  let baseUrl = new URL(button.getAttribute("href"));

  button.addEventListener("click", (e) => {
    e.preventDefault();
    let houseId = house.dataset.houseId;
    let houseName = house.innerText;
    let dateRange = document
      .querySelector("#reservation-bar-callendar")
      .value.split(" do ");
    let from = dateRange[0];
    let to = dateRange[1] ? dateRange[1] : "";
    let guests = document.querySelector(
      ".reservation-bar__guests-number"
    ).value;

    let paramsObj = {
      id: houseId,
      house: houseName,
      from: from,
      to: to,
      guests: guests,
    };

    let params = new URLSearchParams(paramsObj).toString();
    const reservationUrl = new URL(
      `${baseUrl.origin}${baseUrl.pathname}?${params}`
    );

    location.href = reservationUrl.href;
  });
};

export default addUrlParam