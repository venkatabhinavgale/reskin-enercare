"use strict";

(function ($, document) {
  function enercareGravityFormsPostRender() {
    var gravityForm = $('.gform_wrapper form');
    var firstInput = gravityForm.find('input[type=text],textarea,select').filter(':visible:first');

    if (gravityForm && gravityForm.attr('data-engaged')) {
      console.log('removing input listener');
      firstInput.off("input");
    } else {
      firstInput.on("input", function () {
        if (gravityForm && !gravityForm.attr('data-engaged')) {
          console.log('setting data-engaged to true.');
          gravityForm.attr('data-engaged', true);

          if (dataLayer) {
            console.log('pushing form start event.');
            dataLayer.push({
              'state': 'Form Start',
              'event': 'gaTriggerEvent'
            });
          }
        }
      });
    }
  }

  $(document).on('gform_post_render', function () {
    enercareGravityFormsPostRender();
  });

  function enercareGravityFormsConfirmationLoaded() {
    // do neat GA shit
    if (dataLayer) {
      console.log('pushing form completion event.');
      dataLayer.push({
        'state': 'Form Completion',
        'event': 'gaTriggerEvent'
      });
    }
  }

  $(document).on('gform_confirmation_loaded', function () {
    enercareGravityFormsConfirmationLoaded();
  });
})(jQuery, document);