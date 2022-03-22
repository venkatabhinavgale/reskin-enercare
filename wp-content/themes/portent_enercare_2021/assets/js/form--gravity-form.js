"use strict";

(function ($, document) {
  function enercareGravityFormsPostRender() {
    var gravityForm = $('.gform_wrapper form');
    var gravityFormId = gravityForm.attr('id');
    var firstInput = gravityForm.find('input[type=text],textarea,select').filter(':visible:first'); // use the gravity form id to create a local storage variable. ie. gform_4_engaged

    var gformEngagedId = gravityFormId + "_engaged";

    if (gravityForm && sessionStorage.getItem(gformEngagedId)) {
      console.log('removing input listener');
      firstInput.off("input");
    } else {
      firstInput.on("input", function () {
        if (gravityForm && !sessionStorage.getItem(gformEngagedId)) {
          console.log('setting gform_engaged local variable to true.');
          sessionStorage.setItem(gformEngagedId, true);

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
  enercareGravityFormsPostRender();

  function enercareGravityFormsConfirmationLoaded() {
    var gravityFormMessage = $('.gform_confirmation_message');
    var gravityFormMessageId = gravityFormMessage.attr('id'); // use the gravity form id to create a local storage variable. ie. gform_4_engaged

    var gformEngagedId = gravityFormMessageId.replace("confirmation_message_", "") + "_engaged"; // remove local storage variable

    sessionStorage.removeItem(gformEngagedId); // do neat GA shit

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