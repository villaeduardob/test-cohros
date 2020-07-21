<?php

include('classes/Functions.php');
$function = new Functions();

if ($_POST['function'] == 'customers') {

	$data = array(
		'name'		=> (($_POST['name']) ? trim(strip_tags($_POST['name'])) : NULL),
		'email'		=> (($_POST['email']) ? trim(strip_tags($_POST['email'])) : NULL),
		'password'	=> (($_POST['password']) ? trim(strip_tags($_POST['password'])) : NULL),
	);

	# checks if the email you entered is already being used
	$check = $function->checkCustomer($_POST['email']);
	if (!$check) {

		# register the client
		$insert = $function->createCustomers($data);
		if ($insert) {

			echo json_encode([
				'action'	=> 'success',
				'message'	=> 'Cliente cadastrado com sucesso!'
			]);

		} else {

			echo json_encode([
				'action'	=> 'danger',
				'message'	=> 'Não foi possível cadastrar este cliente!'
			]);

		} 

	} else {

		echo json_encode([
			'action'	=> 'danger',
			'message'	=> 'Este e-mail já esta sendo utilizado!'
		]);
	}

}


if ($_POST['function'] == 'login') {

	$data = array(
		'email'		=> (($_POST['email']) ? trim(strip_tags($_POST['email'])) : NULL),
		'password'	=> (($_POST['password']) ? trim(strip_tags($_POST['password'])) : NULL),
	);

	# checks if the email you entered is already being used
	$check = $function->login($_POST['email'], $_POST['password']);
	if ($check) {

		session_start();

		$_SESSION['email']		= $_POST['email'];
		$_SESSION['password']	= $_POST['password'];
		$_SESSION['check']		= TRUE;

		echo json_encode([
			'action'	=> 'success',
			'message'	=> 'Cliente encontrado com sucesso!'
		]);

	} else {

		echo json_encode([
			'action'	=> 'danger',
			'message'	=> 'Cliente não identificado!'
		]);
	} 

}


if ($_POST['function'] == 'list') {

	echo $function->contacts();

}


if ($_POST['function'] == 'contacts') {

	$data = array(
		'name'			=> (($_POST['name']) ? trim(strip_tags($_POST['name'])) : NULL),
		'email'			=> (($_POST['email']) ? trim(strip_tags($_POST['email'])) : NULL),
		'address'		=> (($_POST['address']) ? trim(strip_tags($_POST['address'])) : NULL),
		'number'		=> (($_POST['number']) ? trim(strip_tags($_POST['number'])) : NULL),
		'complement'	=> (($_POST['complement']) ? trim(strip_tags($_POST['complement'])) : NULL),
		'zipcode'		=> (($_POST['zipcode']) ? trim(strip_tags($_POST['zipcode'])) : NULL),
		'neighborhood'	=> (($_POST['neighborhood']) ? trim(strip_tags($_POST['neighborhood'])) : NULL),
		'city'			=> (($_POST['city']) ? trim(strip_tags($_POST['city'])) : NULL),
		'state'			=> (($_POST['state']) ? trim(strip_tags($_POST['state'])) : NULL),
		'phone1'	=> (($_POST['phone1']) ? trim(strip_tags($_POST['phone1'])) : NULL),
		'phone2'	=> (($_POST['phone2']) ? trim(strip_tags($_POST['phone2'])) : NULL),
		'phone3'	=> (($_POST['phone3']) ? trim(strip_tags($_POST['phone3'])) : NULL),
		'phone4'	=> (($_POST['phone4']) ? trim(strip_tags($_POST['phone4'])) : NULL),
		'phone5'	=> (($_POST['phone5']) ? trim(strip_tags($_POST['phone5'])) : NULL),
		'phone6'	=> (($_POST['phone6']) ? trim(strip_tags($_POST['phone6'])) : NULL),
	);

	# checks if the email you entered is already being used
	$check = $function->checkContact($_POST['email']);
	if (!$check) {

		# register the client
		$insert = $function->createContacts($data);
		if ($insert) {

			echo json_encode([
				'action'	=> 'success',
				'message'	=> 'Contato cadastrado com sucesso!'
			]);

		} else {

			echo json_encode([
				'action'	=> 'danger',
				'message'	=> 'Não foi possível cadastrar este contato!'
			]);

		} 

	} else {

		echo json_encode([
			'action'	=> 'danger',
			'message'	=> 'Este e-mail já esta sendo utilizado!'
		]);
	}

}


if ($_GET['function'] == 'edit') {

	echo $_GET['id'];

}


if ($_POST['function'] == 'trash') {

	$id = $_POST['id'];

	$delete = $function->deleteContact($id);
	if ($delete) {

		echo json_encode([
			'action'	=> 'success',
			'message'	=> 'Contato apagado com sucesso!'
		]);

	} else {

		echo json_encode([
			'action'	=> 'danger',
			'message'	=> 'Não foi possível apagar este contato!'
		]);

	}

}