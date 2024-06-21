var swiper = new Swiper(".mySwiper", {
    slidesPerView: 2,
    spaceBetween: 10,
    freeMode: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      // A partir de 500 px, on affiche 3 slides
      500: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      // A partir de 800 px, on affiche 4 slides
      800: {
        slidesPerView: 4,
        spaceBetween: 30
      }
    }
  });