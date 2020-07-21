$(document).ready(function(){

	if (document.getElementById('formLogin') !== null) 
	{
		var formName = $('#formLogin');

		// validação formulário
		formName.validate({
			ignore: '',
			rules: {
				email: {
					required:	true,
					email:		true
				},
				password:		'required'
			},
			messages: {
				email: {
					required:	'O campo e-mail obrigatório',
					email:		'E-mail informado inválido',
				},
				password:		'O campo senha é obrigatório'
			},
			showErrors: function(errorMap, errorList) {
				if (errorList.length) {
					$('div#message').removeClass().addClass('alert alert-danger').html(errorList[0].message).show();
				}
			},
			submitHandler: function(form) {

				$('button#btnForm').prop('disabled', true);

				$.ajax({
					type:		'POST',
					dataType:	'json',
					url:		'function',
					data:		formName.serialize(),
					success: function(dataReturn) {

						if (dataReturn.action == 'success') {

							formName[0].reset();
							$('div#message').removeClass().addClass('alert alert-success').html(dataReturn.message).show();
							setTimeout(function(){ 
								setTimeout(function(){ $('div#message').html('').hide(); }, 3000);
								window.location.href = 'home'; 
							}, 3000);

						} else {

							$('div#message').removeClass().addClass('alert alert-danger').html(dataReturn.message).show();
							setTimeout(function(){ $('div#message').html('').hide(); }, 3000);

							$('button#btnForm').prop('disabled', false);

						}

					}
				});

				return false;

			}
		});
	}


	if (document.getElementById('formCreateCustomers') !== null) 
	{
		var formName = $('#formCreateCustomers');

		// validação formulário
		formName.validate({
			ignore: '',
			rules: {
				name:			'required',
				email: {
					required:	true,
					email:		true
				},
				password:		'required'
			},
			messages: {
				name:			'O campo nome é obrigatório',
				email: {
					required:	'O campo e-mail obrigatório',
					email:		'E-mail informado inválido',
				},
				password:		'O campo senha é obrigatório'
			},
			showErrors: function(errorMap, errorList) {
				if (errorList.length) {
					$('div#message').removeClass().addClass('alert alert-danger').html(errorList[0].message).show();
				}
			},
			submitHandler: function(form) {

				$('button#btnForm').prop('disabled', true);

				$.ajax({
					type:		'POST',
					dataType:	'json',
					url:		'function',
					data:		formName.serialize(),
					success: function(dataReturn) {

						if (dataReturn.action == 'success') {

							formName[0].reset();
							$('div#message').removeClass().addClass('alert alert-success').html(dataReturn.message).show();
							setTimeout(function(){ 
								setTimeout(function(){ $('div#message').html('').hide(); }, 3000);
								window.location.href = 'login'; 
							}, 3000);

						} else {

							$('div#message').removeClass().addClass('alert alert-danger').html(dataReturn.message).show();
							setTimeout(function(){ $('div#message').html('').hide(); }, 3000);

							$('button#btnForm').prop('disabled', false);

						}

					}
				});

				return false;

			}
		});
	}

});