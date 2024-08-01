import Swiper from 'swiper';
import { Autoplay } from 'swiper/modules';

/**
 * JS Carousel Function
 */
export const jsCarousel = async (err) => {
  if (err) {
    console.error(err);
  }

  document
    .querySelectorAll('.c-js-carousel')
    .forEach(function (jsCarouselElement) {
      const sliderWrapper = jsCarouselElement.querySelector('.swiper');

      const { itemsDesktop, itemsTablet, itemsMobile } = sliderWrapper.dataset;

      const desktopItems = parseFloat(itemsDesktop);
      const tabletItems = parseFloat(itemsTablet);
      const mobileItems = parseFloat(itemsMobile);

      const slidesOffsetMobile =
        mobileItems && Math.floor(mobileItems) === mobileItems ? 0 : 16;
      const slidesOffsetTablet =
        tabletItems && Math.floor(tabletItems) === tabletItems ? 0 : 16;

      const swiperOptions = {
        modules: [Autoplay],
        loop: true,
        slidesPerView: mobileItems,
        spaceBetween: 16,
        slidesOffsetBefore: slidesOffsetMobile,
        slidesOffsetAfter: slidesOffsetMobile,
        breakpoints: {
          768: {
            slidesPerView: tabletItems,
            spaceBetween: 18,
            slidesOffsetBefore: slidesOffsetTablet,
            slidesOffsetAfter: slidesOffsetTablet,
          },
          1024: {
            slidesPerView: desktopItems,
            spaceBetween: 18,
            slidesOffsetBefore: 0,
            slidesOffsetAfter: 0,
          },
        },
      };

      const dataAutoplay = sliderWrapper.dataset.autoplay;
      if (dataAutoplay === '1') {
        const autoplayDelayValue = +sliderWrapper.dataset.autoplaySpeed;

        swiperOptions.autoplay = {
          delay: autoplayDelayValue,
        };
      }

      const swiper = new Swiper(sliderWrapper, swiperOptions);

      const prevButton = jsCarouselElement.querySelector(
        '.c-carousel-button--js-prev-trigger'
      );
      const nextButton = jsCarouselElement.querySelector(
        '.c-carousel-button--js-next-trigger'
      );

      const numberOfSlides = swiper.slides.length;
      if (numberOfSlides === 1) {
        prevButton.style.display = 'none';
        nextButton.style.display = 'none';
      }

      prevButton &&
        prevButton.addEventListener('click', function () {
          swiper.slidePrev();
        });

      nextButton &&
        nextButton.addEventListener('click', function () {
          swiper.slideNext();
        });
    });
};
