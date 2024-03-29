function payWithPaystack(email, phone, first_name, last_name, payment_ref, amount){
	var handler = PaystackPop.setup({
		key: 'pk_live_830894bd347b6104e470a87de87f17efd9021fbb',
		email: email,
		amount: amount,
		ref: payment_ref,
		first_name: first_name,
		last_name: last_name,
		metadata: {
			custom_fields: [
				{
					display_name: "Mobile Number",
					variable_name: "mobile_number",
					value: phone
				}
			]
		},
		callback: function (response) {
			alert('success. transaction is sucessful, Ref is '+ response);
			updatePayment(payment_ref, response);
		},
		onClose: function () {
			alert ('Transaction Cancelled');
		}
	});	

	handler.openIframe();
}

function updatePayment(payment_ref, transaction_ref)
{
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
		},
		url:"{{ 'updatePayment' }}",
		method:"POST",
		data: {'referenceNumber':payment_ref, 'transactionReference':transaction_ref},
		success: function(data){
			console.log('data');
			if(data.status === 'status') {
				$('#paymentStatus').text('paid');
				$('#bookingNumber').show();
				$('#all-payment-wrapper').hide();
			}
		}
		});
}

