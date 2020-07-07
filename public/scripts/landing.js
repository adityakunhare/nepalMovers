$(document).ready(function () {
  //image slider
  $(".promo-slider").slick({
    autoplay: true,
    dots: true,
  });

  //reviews slider
  $(".reviews").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    autoplay: true,
    dots: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  // link to service and landing page
  $("#document").click(function () {
    document.location.href = "document-cargo.html";
  });
  $("#house-shifting").click(function () {
    document.location.href = "house-shifting.html";
  });
  $("#office-shifting").click(function () {
    document.location.href = "office-shifting.html";
  });
  $("#vehicle-on-hire").click(function () {
    document.location.href = "vehicle-on-hire.html";
  });
  $("#boxing-and-packaging").click(function () {
    document.location.href = "boxing-and-packaging.html";
  });
  $("#online-sales-delivery").click(function () {
    document.location.href = "online-sales-delivery.html";
  });
  $("#corporate-delivery").click(function () {
    document.location.href = "corporate-delivery.html";
  });
});
