const scrollBanner = () => {
  const btn = document.querySelector(".banner__scroll");
  if (!btn) return;

  btn.addEventListener("click", (e) => {
    e.preventDefault();
    const banner = document.querySelector(".banner");
    window.scrollTo({
      top: banner.offsetHeight - 100,
      left: 0,
      behavior: "smooth",
    });
  });
};

export default scrollBanner;
