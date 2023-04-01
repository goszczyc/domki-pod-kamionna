const guestCounter = () => {
  const counter = document.querySelector(".reservation-bar__guests-number");

  if (!counter) return;

  const min = 1;
  const max = 8;

  const addBtn = document.querySelector(".reservation-bar__guests-btn--add");
  const subtractBtn = document.querySelector(
    ".reservation-bar__guests-btn--sub"
  );

  addBtn.addEventListener("click", (e) => {
    e.preventDefault();
    counter.value++;
    checkValue();
  });
  subtractBtn.addEventListener("click", (e) => {
    e.preventDefault();
    counter.value--;
    checkValue();
  });

  function checkValue() {
    if (counter.value <= min) {
      subtractBtn.disabled = true;
      counter.value = min;
    } else if (counter.value >= max) {
      addBtn.disabled = true;
      counter.value = max;
    } else {
      addBtn.disabled = false;
      subtractBtn.disabled = false;
    }
  }
};

export default guestCounter;
