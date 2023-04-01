const paralaxScroll = () => {
  const container = document.querySelector(".comments-section__bg");
  const image = document.querySelector(".comments-section__bg-image");
  if (!container) return;
  const root = null;
  const maxScrollDist = image.offsetHeight - container.offsetHeight;

  let position = container.getBoundingClientRect();

  document.addEventListener("scroll", (e) => {
    let imageHeight = image.offsetHeight;
    let viewHeight = window.innerHeight;
    let bottom = container.getBoundingClientRect().bottom;
    let height = position.height;
    let maxRange = imageHeight - height;
    let getPosition = height + viewHeight - bottom;
    let top;

    if (getPosition > 0 && getPosition < (height + viewHeight)) {
      top = (getPosition*maxRange)/(height + viewHeight);

      image.style.top = -top+'px'
    }
  });
};

export default paralaxScroll;
