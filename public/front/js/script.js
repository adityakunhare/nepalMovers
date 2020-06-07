(function ($) {
  // Begin jQuery
  $(function () {
    // DOM ready
    // If a link has a dropdown, add sub menu toggle.
    $("nav ul li a:not(:only-child)").click(function (e) {
      $(this).siblings(".nav-dropdown").toggle();
      // Close one dropdown when selecting another
      $(".nav-dropdown").not($(this).siblings()).hide();
      e.stopPropagation();
    });
    // Clicking away from dropdown will remove the dropdown class
    $("html").click(function () {
      $(".nav-dropdown").hide();
    });
    // Toggle open and close nav styles on click
    $("#nav-toggle").click(function () {
      $("nav ul").slideToggle();
    });
    // Hamburger to X toggle
    $("#nav-toggle").on("click", function () {
      this.classList.toggle("active");
    });
  }); // end DOM ready
})(jQuery); // end jQuery

$(document).ready(function () {
  $(".promo-slider").slick({
    autoplay: true,
    dots: true,
  });
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
  $("#document").click(function () {
    document.location.href = "#";
  });
  $("#house").click(function () {
    document.location.href = "#";
  });
  $("#boxing").click(function () {
    document.location.href = "#";
  });
  $("#hire").click(function () {
    document.location.href = "#";
  });
  $("#handyman").click(function () {
    document.location.href = "#";
  });
  $("#insurance").click(function () {
    document.location.href = "#";
  });
});

//own APIKEY=AIzaSyDVCiDA5cBOVWSS4gd2geOew2AZ_6OLjMQ
//citycargo api = AIzaSyBxlyFdu1u7ti-YajIpjTQNu1uN9zPih48
//movernepal api = AIzaSyAc5dIekrOf4KySbYLnfIBAC_QHv0yAqcI
$.getScript(
  "https://maps.googleapis.com/maps/api/js?key=AIzaSyAc5dIekrOf4KySbYLnfIBAC_QHv0yAqcI&libraries=places",
  function () {
    initApp();
  }
);

function initApp() {
  var cityBounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(27.568798, 85.072578),
    new google.maps.LatLng(27.793286, 85.568988)
  );

  var originInput = document.getElementById("pickup-location");
  var destinationInput = document.getElementById("dropoff-location");
  var originAutocomplete = new google.maps.places.Autocomplete(originInput);
  originAutocomplete.setComponentRestrictions({ country: "np" });
  originAutocomplete.setFields(["geometry"]);
  originAutocomplete.setBounds(cityBounds);
  originAutocomplete.setOptions({ strictBounds: true });

  var destinationAutocomplete = new google.maps.places.Autocomplete(
    destinationInput
  );
  destinationAutocomplete.setComponentRestrictions({ country: "np" });
  destinationAutocomplete.setFields(["geometry"]);
  destinationAutocomplete.setBounds(cityBounds);
  destinationAutocomplete.setOptions({ strictBounds: true });

  // setupPlaceChangedListener(originAutocomplete, "address-1");
  // setupPlaceChangedListener(destinationAutocomplete, "address-2");
}
