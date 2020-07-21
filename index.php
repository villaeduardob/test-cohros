<?php
	$aux = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
	$parameters = str_replace($aux, '', $_SERVER['REQUEST_URI']);

	$urlParts = explode('/', $parameters);

	switch ($urlParts[0]) {
		case 'function':			require_once 'functions.php';			break;
		case 'login':				require_once 'login.php';				break;
		case 'logout':				require_once 'logout.php';				break;
		case 'create-customers':	require_once 'create_customers.php';	break;
		case 'home':				require_once 'home.php';				break;
		case 'create-contact':		require_once 'create_contacts.php';		break;
		case 'edit/'.$urlParts[1]:	require_once 'functions.php?function=edit&id='.$urlParts[1];		break;
		default:					require_once 'login.php';
	}
?>