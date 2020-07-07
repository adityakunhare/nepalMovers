$(document).ready(function () {
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
  //password toggle to text
  $(".toggle-password").click(function () {
    $(this).children("i").toggleClass("fa-eye fa-eye-slash");

    var input = $("#password");

    if (input.attr("type") === "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });

  // Script to get places name from google map
  //own APIKEY=AIzaSyDVCiDA5cBOVWSS4gd2geOew2AZ_6OLjMQ
  //citycargo api = AIzaSyBxlyFdu1u7ti-YajIpjTQNu1uN9zPih48
  //movernepal api = AIzaSyAc5dIekrOf4KySbYLnfIBAC_QHv0yAqcI
  $.getScript(
    "https://maps.googleapis.com/maps/api/js?key=AIzaSyBxlyFdu1u7ti-YajIpjTQNu1uN9zPih48&libraries=places",
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
    console.log();
    // setupPlaceChangedListener(originAutocomplete, "address-1");
    // setupPlaceChangedListener(destinationAutocomplete, "address-2");
  }
  var locArr = [];
  var stopCount = 0;
  $("#pickup-date").datetimepicker({
    minDate: new Date(),
    format: "Y/m/d H:i",
  });
  $(".residential-type input").on("change", function () {
    // alert($("input:checked", ".residential-type").val());
    if ($("input:checked", ".residential-type").val() == "Residential") {
      $(".floor-selection").show();
    }
    if ($("input:checked", ".residential-type").val() == "Apartment") {
      $(".floor-selection").hide();
      $(".floor-selection input[type=checkbox]").prop("checked", false);
    }
  });
  function validateAddress() {
    $("#estimateForm .feedback").hide();
    $("#estimateForm .input-group").removeClass("has-error");
    // check empty fields
    var inputs = $("#estimateForm input[type=text]");
    var all = false;
    $.each(inputs, function (index, value) {
      var input = $(value);
      var parent = input.parent();
      if (input.attr("id") !== "pickup-date") {
        if (input.val() === "") {
          console.log("form error");
          parent.find(".feedback").show();
          parent.addClass("has-error");
          all = false;
          return false;
        } else {
          console.log("not error");
          all = true;
        }
      }
    });

    return all;
  }

  function changeAddressCount() {
    var address = $(document).find(".stop");
    if (address.length > 1) {
      $.each(address, function (index, value) {
        var label = value;
        $(label).html("Stop " + (index + 1) + "");
      });
    } else {
      var label = address[0];
      $(label).html("Stop");
    }
  }
  $(".add-stop").click(function () {
    $(".err-msg").hide();
    var check = validateAddress();
    if (check) {
      stopCount++;
      var appendStr =
        "<div class='input-group has-icon is-removable'>\n\
        <label for='stop" +
        stopCount +
        "' class='stop'>Stop " +
        stopCount +
        "</label>\n\
        <input type='text' name='stop" +
        stopCount +
        "'' id='stop" +
        stopCount +
        "' placeholder='eg. New Baneshwor' required /> \n\
        <div class='is-icon remove-field'>\n\
          <i class='fas fa-times'></i>\n\
        </div>\n\
        <div class='err-msg'> \n\
        <p class='feedback'>\n\
          Need stop location\n\
        </p>\n\
      </div>\n\
      </div>";
      $(".stop-point").append(appendStr);

      changeAddressCount();
      var cityBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(27.568798, 85.072578),
        new google.maps.LatLng(27.793286, 85.568988)
      );
      var stopPointInput = document.getElementById("stop" + stopCount);
      var stopPointAutocomplete = new google.maps.places.Autocomplete(
        stopPointInput
      );
      stopPointAutocomplete.setComponentRestrictions({ country: "np" });
      stopPointAutocomplete.setFields(["geometry"]);
      stopPointAutocomplete.setBounds(cityBounds);
    }
  });
  $(document).on("click", ".remove-field", function (e) {
    e.preventDefault();

    var $current = $(this);

    var parent = $current.parent();
    var input = parent.find("input");
    var id = $(input[0]).attr("id");

    var elem_index = 0;

    $.each(locArr, function (index, value) {
      if (value.for === id) {
        elem_index = index;
      }
    });

    var next_index = parseFloat(elem_index + 1);
    var next_elem = "";

    var next = locArr[next_index];

    $.each(locArr, function (index, value) {
      var elem = value.for;
      if (elem === id) {
        locArr.splice(index, 1);
        return false;
      }
    });
    parent.remove();
    changeAddressCount();
  });
});
$(".custom-select").each(function () {
  var classes = $(this).attr("class"),
    id = $(this).attr("id"),
    name = $(this).attr("name");
  var template = '<div class="' + classes + '">';
  template +=
    '<span class="custom-select-trigger placeholder">' +
    $(this).attr("placeholder") +
    "<i class='fas fa-caret-down'></i>" +
    "</span>";
  template += '<div class="custom-options">';
  $(this)
    .find("option")
    .each(function () {
      template +=
        '<span class="custom-option ' +
        '" data-value="' +
        $(this).attr("value") +
        '">' +
        $(this).html() +
        "</span>";
    });
  template += "</div></div>";

  $(this).wrap('<div class="custom-select-wrapper"></div>');
  $(this).hide();
  $(this).after(template);
});
$(".custom-select-trigger").on("click", function () {
  $("html").on("click", function () {
    $(".custom-select").removeClass("opened");
  });
  $(this).parents(".custom-select").toggleClass("opened");
  event.stopPropagation();
});
$(".custom-option").on("click", function () {
  $(this)
    .parents(".custom-select")
    .find(".custom-select-trigger")
    .removeClass("placeholder");
  $(this)
    .parents(".custom-select-wrapper")
    .find("select")
    .val($(this).data("value"));
  $(this)
    .parents(".custom-options")
    .find(".custom-option")
    .removeClass("selection");
  $(this).addClass("selection");
  $(this).parents(".custom-select").removeClass("opened");
  $(this)
    .parents(".custom-select")
    .find(".custom-select-trigger")
    .html($(this).text() + "<i class='fas fa-caret-down'></i>");
});
var sheet = document.createElement("style"),
  $rangeInput = $(".range input"),
  prefs = ["webkit-slider-runnable-track", "moz-range-track", "ms-track"];

document.body.appendChild(sheet);

var getTrackStyle = function (el) {
  var curVal = el.value,
    val = (curVal - 1) * 20,
    style = "";

  // Set active label
  $(".range-labels li").removeClass("active selected");

  var curLabel = $(".range-labels").find("li:nth-child(" + curVal + ")");

  curLabel.addClass("active selected");
  curLabel.prevAll().addClass("selected");

  // Change background gradient
  for (var i = 0; i < prefs.length; i++) {
    style +=
      ".range {background: linear-gradient(to right, #04a777 0%, #04a777 " +
      val +
      "%, #fff " +
      val +
      "%, #fff 100%)}";
    style +=
      ".range input::-" +
      prefs[i] +
      "{background: linear-gradient(to right, #04a777 0%, #04a777 " +
      val +
      "%, #b2b2b2 " +
      val +
      "%, #b2b2b2 100%)}";
  }

  return style;
};

$rangeInput.on("input", function () {
  sheet.textContent = getTrackStyle(this);
});

// Change input value on label click
$(".range-labels li").on("click", function () {
  var index = $(this).index();

  $rangeInput.val(index + 1).trigger("input");
});
const items = document.querySelectorAll(".questions button");

function toggleAccordion() {
  const itemToggle = this.getAttribute("aria-expanded");

  for (i = 0; i < items.length; i++) {
    items[i].setAttribute("aria-expanded", "false");
  }

  if (itemToggle == "false") {
    this.setAttribute("aria-expanded", "true");
  }
}

items.forEach(item => item.addEventListener("click", toggleAccordion));
