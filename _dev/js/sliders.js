const attractionsSlider = () => {
  $(".attractions-slider").slick({
    infinite: false,
    slidesToShow: 1,
    autoplay: false,
    arrows: false,
    centerMode: true,
    dots: false,
  });
};

const slidersFromLayouts = () => {
  $(".images-slider").slick({
    infinite: true,
    slidesToShow: 3,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false,
    dots: false,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
        },
      },
    ],
  });
};

const iconsSlider = () => {
  $(".icons__slider").slick({
    infinite: true,
    slidesToShow: 5,
    autoplay: true,
    arrows: false,
    dots: false,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 2
        }
      },
    ]
  });
};
export { attractionsSlider, slidersFromLayouts, iconsSlider };
