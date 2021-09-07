"use strict";

window.addEventListener('load', function () {
  var tcToggle = document.querySelectorAll('.block-faqs--faq-container');
  tcToggle.forEach(function (tc) {
    tc.addEventListener("click", function () {
      var faqContent = tc.querySelector('.block-faqs--faq-answer-container');
      if (faqContent.getAttribute("data-state") == "open") faqContent.setAttribute("data-state", "closed");else faqContent.setAttribute("data-state", "open");
    });
  });
});