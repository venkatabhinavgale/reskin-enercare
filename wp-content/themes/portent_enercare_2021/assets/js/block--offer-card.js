"use strict";

window.addEventListener('load', function () {
  var tcToggle = document.querySelectorAll('.block-offer-card__terms');
  tcToggle.forEach(function (tc) {
    tc.addEventListener("click", function () {
      var termsContent = tc.querySelector('.block-offer-card__terms-details');
      if (termsContent.getAttribute("data-state") == "open") termsContent.setAttribute("data-state", "closed");else termsContent.setAttribute("data-state", "open");
    });
  });
});