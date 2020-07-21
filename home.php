<?php
	session_start();

	if (!$_SESSION['check'] == TRUE) {
		header('Location: /cohros/login');
	}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="area_publica/core/assets/imagens/favicon-cohros.png" type="image/png">
	<title>Test - Cohors</title>
	<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
	<link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/custom.css" rel="stylesheet">
</head>

<body class="bg-light">

	<div class="container">
		<div class="py-5 text-center">

			<img class="mb-4" src="assets/images/logo.png" width="72" height="72" style="-webkit-filter:grayscale(30%);filter:brightness(30%);">

			<h2>Teste Prático - PHP</h2>

			<p class="lead">
				<?php echo $_SESSION['email']; ?> 
				<a class="btn btn-secondary btn-sm" href="/cohros/logout">Sair</a>
			</p>

			<hr>
		</div>

		<div class="row">
			<div class="col-md-12 order-md-1">

				<div class="pull-right">
					<a class="btn btn-secondary btn-sm" href="/cohros/create-contact">Cadastrar Contato</a>
				</div>

				<br>

				<div id="message" class="alert" role="alert" style="display:none;"></div>
				
				<div class="table-responsive-md">
					<table class="table" id="tableContacts">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nome</th>
								<th scope="col">E-mail</th>
								<th scope="col">Endereço</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="5" align="center">Nenhum registro localizado</td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>

	<script src="assets/js/jquery/jquery.min.js"></script>
	<script src="assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>

</body>

</html>