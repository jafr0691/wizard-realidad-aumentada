$(document).ready(function(){
  $('.modal').modal();
  $(".scrollbar").mCustomScrollbar({
    theme:"dark"
  })

  $('.carousel-fade').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    arrows: false,
    autoplay: true
  })

  $('.multiple-items').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    prevArrow: $('#mural .prev'),
    nextArrow: $('#mural .next'),
    responsive: [
      {
        breakpoint: 414,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  })

    $('.multiple-items_1').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        prevArrow: $('#most_viewed .prev'),
        nextArrow: $('#most_viewed .next'),
        responsive: [
            {
                breakpoint: 414,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    })

  $('.tags').slick({
    dots: false,
    slidesToShow: 12,
    slidesToScroll: 1,
    variableWidth: true,
    prevArrow: $('.prev'),
    nextArrow: $('.next')
  })

  $(".menu").click(() => {
    if (!$(".sidebar").hasClass("active")) {
      $(".sidebar").addClass("active")
      $("body").addClass("no-scroll")
    } else {
      $(".sidebar").removeClass("active")
      $("body").removeClass("no-scroll")
    }
  })

  $(".mobile-search").click(() => {
    if (!$("#search-mobile").hasClass("active")) {
      $("#search-mobile").addClass("active")
      $(".mobile-search").addClass("active")
    } else {
      $("#search-mobile").removeClass("active")
      $(".mobile-search").removeClass("active")
    }
  })
})
