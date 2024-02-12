console.log('Swipers Loaded')

function productsHighlightSwiper() {
  var swiperHighlightProducts = new Swiper(".swiperHighlightProducts", {
    slidesPerView: "auto",
    spaceBetween: 30,
  });
}

function partnersSwiper() {
  if (window.matchMedia('(min-width: 1024px)').matches) {
    var swiperPartners = new Swiper(".swiperPartners", {
      slidesPerView: "auto",
      centeredSlides: true,
      spaceBetween: 30,
      loop: true,
      // autoplay: {
      //   delay: 2500,
      //   disableOnInteraction: false,
      // },
    });
  } else {
    var swiperPartners = new Swiper(".swiperPartners", {
      slidesPerView: "auto",
      centeredSlides: false,
      spaceBetween: 30,
      loop: true,
      // autoplay: {
      //   delay: 2500,
      //   disableOnInteraction: false,
      // },
    });
  }
}

document.addEventListener("DOMContentLoaded", () => {
  let body = document.querySelector("body");
  const partners = document.querySelector('.partners-component')
  if (body.classList.contains('home')) {
    productsHighlightSwiper()
  }
  if (partners) {
    partnersSwiper()
  }
})