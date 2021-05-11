magpieMagpie.setPublishableKey('pk_test_6dst3MhadIprOSrZ1VXHEQ');

var $form = $('#checkout-form');

$form.submit(function(event){
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled', true);
	Magpie.card.createToken({
		  number: $('#card-number').val(),
		  cvc: $('#card-cvc').val(),
		  exp_month: $('#card-expiry-month').val(),
		  exp_year: $('#card-expiry-year').val(),
		  name: $('#card-name').val()
	  }, magpieResponseHandler);
	  return false;
});

function magpieResponseHandler(status, response){
	if (response.error) {
		$('#charge-error').removeClass('hidden');
		$('#charge-error').text(response.error.message);
		$form.find('button').prop('disabled', false);
	} else {
		var token = response.id;
        $form.append($('<input type="hidden" name="magpieToken" />').val(token));
        $form.get(0).submit();

	}
}
