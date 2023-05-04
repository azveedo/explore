import Swiper from "swiper";
import "swiper/swiper.scss";

import Swiper, { Navigation, Pagination } from "swiper";

Swiper.use([Navigation, Pagination]);

import "swiper/swiper-bundle.min.css";
import "swiper/swiper.min.css";

export function createCarousel() {
  return new Swiper(".swiperCarousel", {
    slidesPerView: 1,
    spaceBetween: 30,

    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },

    grabCursor: true,
    breakpoints: {
      600: {
        slidesPerView: 2,
        spaceBetween: 30,
      },
    },
  });
}
