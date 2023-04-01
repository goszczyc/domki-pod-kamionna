export default () => {
  const comments = document.querySelectorAll(".comments-section__comment");

  if (!comments) return;
  let i = 0;
  fadeInOut(comments, 6000, i)

  async function fadeInOut(elements, duration, index) {
    if (index > elements.length) index = 0;
    let element = elements[index];
    element.style.display = "block";
    element.animate(
      [
        { opacity: 0 },
        { opacity: 1, offset: 0.1},
        { opacity: 1, offset: 0.9 },
        { opacity: 0 },
      ],
      {
        duration: duration,
        fill: "forwards",
        easing: 'ease-in-out'
      }
    );
    await sleep(duration);
    element.style.display = "none";
    fadeInOut(elements, duration, index);
  }

  function sleep(duration) {
    return new Promise((resolve) => {
      setTimeout(() => {
        resolve();
      }, duration);
    });
  }
};
