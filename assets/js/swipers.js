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
function filtersSwiper() {
  var containers = document.querySelectorAll('.filter-options:not(.filter-options-promo)')
  if (containers.length > 0) {
    containers.forEach(container => {
      container.classList.add('swiperFilters')
      container.classList.add('swiper')
      var wrapper = container.querySelector('.filter-wrapper')
      if (wrapper) {
        wrapper.classList.add('swiper-wrapper')
      }
      var filters = container.querySelectorAll('.filter-option-label')
      if (filters.length > 0) {
        filters.forEach(filter => {
          filter.classList.add('swiper-slide')
        })
      }
      buildSwiperSlider(container)
    })
  }
}
const buildSwiperSlider = sliderElm => {
  console.log(sliderElm.dataset.id)
  return new Swiper(`.filter-options[data-id="${sliderElm.dataset.id}"]`, {
    slidesPerView: "auto",
    spaceBetween: 10,
  });
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
  if (body.classList.contains('post-type-archive-product')) {
    if (window.matchMedia('(max-width: 1024px)').matches) {
      filtersSwiper()
    }
  }
})