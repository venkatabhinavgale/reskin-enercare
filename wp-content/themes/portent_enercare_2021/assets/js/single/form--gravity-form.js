(function($, document) {
	function enercareGravityFormsPostRender(form_id, current_page) {
    let firstInput = document.querySelector('#gform_' + form_id + ' input:first-of-type');
    
    //var firstInput = gravityForm.find('input[type=text],textarea,select').filter(':visible:first');
    //var inputs = gravityForm.find('input[type=text],textarea,select');
    //console.log(inputs);
    //var firstInput = inputs.get(0);
    console.log(firstInput);
    //var gravityFormEl = document.getElementById(gravityFormId);
    
    // use the gravity form id to create a local storage variable. ie. gform_4_engaged
    let gformEngagedId = "gform_" + form_id + "_engaged";
    
    if (sessionStorage.getItem(gformEngagedId)) {
      //console.log('removing input listener');
      //firstInput.removeEventListener('input');
    } else {
      console.log("creating input listener for firstInput", firstInput);
      
      firstInput.addEventListener('input', function() {
        console.log("input listener fired");
        if (!sessionStorage.getItem(gformEngagedId)) {
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
	$(document).on('gform_post_render', function(event, form_id, current_page) {
		enercareGravityFormsPostRender(form_id, current_page);
	});
  //enercareGravityFormsPostRender();
  
  function enercareGravityFormsConfirmationLoaded() {
    var gravityFormMessage = $('.gform_confirmation_message');
    var gravityFormMessageId = gravityFormMessage.attr('id');
    // use the gravity form id to create a local storage variable. ie. gform_4_engaged
    let gformEngagedId = gravityFormMessageId.replace("confirmation_message_","") + "_engaged";
    // remove local storage variable
    sessionStorage.removeItem(gformEngagedId);
    
    // do neat GA shit
    if (dataLayer) {
      console.log('pushing form completion event.');
      dataLayer.push({
        'state': 'Form Completion',
        'event': 'gaTriggerEvent'
      });
    }
  }
  $(document).on('gform_confirmation_loaded', function() {
		enercareGravityFormsConfirmationLoaded();
	});
  
})(jQuery, document);