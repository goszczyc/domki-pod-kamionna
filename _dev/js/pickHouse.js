const pickHouse = () => {
  let houses = document.querySelectorAll(".house-overlay");
  if (!houses) return;

  houses.forEach((house) => {
    house.addEventListener("click", (e) => {
      e.preventDefault();
      const url = e.currentTarget.dataset.url;
      // window.location = url;
      window.open(url, "_blank") || window.location.replace(url);
    });
  });
};

export default pickHouse;
