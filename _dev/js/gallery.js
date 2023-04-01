import fslightbox from "fslightbox";
import fetch_gallery from "./fetch-gallery";
require('fslightbox');

const gallery = () => {
  const button = document.querySelector(".house__gallery");

  if (!button) return;

  button.addEventListener("click", async (e) => {
    e.preventDefault();
    const lightbox = new FsLightbox();
    const id = button.dataset.id;
    const sources = await fetch_gallery(id);
    lightbox.props.sources = sources;
    lightbox.open();
  });
};


export default gallery;