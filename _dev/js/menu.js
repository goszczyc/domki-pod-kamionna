const mobileMenu = () => {
  const burger = document.querySelector(".header__burger");
  const menu = document.querySelector(".header__menus");
  const menuActive = "header__menus--active";
  const burgerActive = "header__burger--active";
  const subMenuClose = document.querySelector("sub-menu__close");

  if (!burger) return;

  burger.addEventListener("click", (e) => {
    e.preventDefault();
    burger.classList.toggle(burgerActive);
    if (menu.classList.contains(menuActive)) {
      fadeOut(menu);
    } else {
      fadeIn(menu);
    }
  });

  function toggleClass(menu) {
    menu.classList.toggle(menuActive);
  }
  async function fadeIn(menu) {
    await toggleClass(menu);
    document.body.style.height = "100vh";
    document.body.style.overflow = "hidden";
    menu.animate([{ opacity: 0 }, { opacity: 1 }], {
      duration: 300,
      fill: "forwards",
    });
  }
  function fadeOut(menu) {
    document.body.style.height = "unset";
    document.body.style.overflow = "unset";
    menu.animate([{ opacity: 1 }, { opacity: 0 }], {
      duration: 300,
      fill: "forwards",
    });
    setTimeout(function () {
      toggleClass(menu);
    }, 300);
  }
};

export default mobileMenu;
