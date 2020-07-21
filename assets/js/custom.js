$(document).ready(function() {

	if (document.getElementById('tableContacts') !== null) 
	{
		$.ajax({
			type:		'POST',
			dataType:	'json',
			url:		'function',
			data:		{ function:'list' },
			success: function(dataReturn) {

				$('#tableContacts tbody').empty();

				var tbody = '<tbody>';
				var tr = '';
				for (var index in dataReturn) {
					
					var address = dataReturn[index][3] + ', ' + dataReturn[index][4] + ' - ' + 
								  dataReturn[index][6] + ', ' + dataReturn[index][7] + ', ' + 
								  dataReturn[index][8] + '/' + dataReturn[index][9];

						tr += '<td>' + dataReturn[index][0] + '</td>';
						tr += '<td>' + dataReturn[index][1] + '</td>';
						tr += '<td>' + dataReturn[index][2] + '</td>';
						tr += '<td>' + address + '</td>';
						tr += '<td>' + 
								'<a onclick="edit(' + dataReturn[index][0] + ')" style="cursor:pointer;" title="Editar contato">Editar</a> &nbsp;&nbsp; ' + 
								'<a onclick="trash(' + dataReturn[index][0] + ')" style="cursor:pointer;" title="Excluir contato">Excluir</a>' + 
							  '</td>';
					tr += '</tr>';

				}

				$('#tableContacts').append(tbody + tr);
				
			}
		});
	}


	if (document.getElementById('formRegisterContact') !== null) 
	{
		var formName = $('#formRegisterContact');

		// validação formulário
		formName.validate({
			ignore: '',
			rules: {
				name:			'required',
				email: {
					required:	true,
					email:		true
				},
				address:		'required',
				number:			'required',
				zipcode:		'required',
				neighborhood:	'required',
				city:			'required',
				state:			'required'
			},
			messages: {
				name:			'O campo nome obrigatório',
				email: {
					required:	'O campo e-mail obrigatório',
					email:		'E-mail informado inválido',
				},
				address:		'O campo endereço obrigatório',
				number:			'O campo número obrigatório',
				zipcode:		'O campo CEP obrigatório',
				neighborhood:	'O campo bairro obrigatório',
				city:			'O campo cidade obrigatório',
				state:			'O campo estado obrigatório'
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

});


var edit = function(id)
{
	alert('Edição do contato');
	// $.ajax({
	// 	type:		'POST',
	// 	dataType:	'json',
	// 	url:		'function',
	// 	data:		{ function:'edit', id:id },
	// 	success: function(dataReturn) {

	// 	}
	// });
}


var trash = function(id)
{
	if (confirm('Deseja apagar o contato?') == true) {

		$.ajax({
			type:		'POST',
			dataType:	'json',
			url:		'function',
			data:		{ function:'trash', id:id },
			success: function(dataReturn) {

				if (dataReturn.action == 'success') {

					$('div#message').removeClass().addClass('alert alert-success').html(dataReturn.message).show();
					setTimeout(function(){ 
						window.location.href = 'home'; 
					}, 3000);

				} else {

					$('div#message').removeClass().addClass('alert alert-danger').html(dataReturn.message).show();
					setTimeout(function(){ $('div#message').html('').hide(); }, 3000);

				}

			}
		});

	}
}


// cep
if ($('input').hasClass('zipcode')) {
	$('.zipcode').mask('99999-999');
}

// telefone
if ($('input').hasClass('phone')) {
	var SPMaskBehavior = function (val) {
		return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	spOptions = {
		onKeyPress: function(val, e, field, options) {
			field.mask(SPMaskBehavior.apply({}, arguments), options);
		}
	};
	$('.phone').mask(SPMaskBehavior, spOptions);
}

// aceita somente numero
var checkNumber = function(e) 
{
	if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		return false;
	}
}