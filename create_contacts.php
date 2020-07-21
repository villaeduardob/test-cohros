<?php
session_start();

if (!$_SESSION['check'] == TRUE) {
	header('Location: /cohros/logout');
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
					<a class="btn btn-secondary btn-sm" href="/cohros/home">Voltar a listagem</a>
				</div>

				<br>

				<h4 class="mb-3">Cadastrar novo contato</h4>
				
				<form class="form-signin" id="formRegisterContact" method="post">
					<div id="message" class="alert" role="alert" style="display:none;"></div>
		
					<input type="text" id="name" name="name" class="form-control mb-2" placeholder="Nome" autocomplete="off" autofocus>
					
					<input type="email" id="email" name="email" class="form-control mb-2" placeholder="E-mail" autocomplete="off">
					
					<div class="row">
						<div class="col-md-8">
							<input type="text" id="address" name="address" class="form-control mb-2" placeholder="Endereço" autocomplete="off">
						</div>

						<div class="col-md-4">
							<input type="text" id="number" name="number" class="form-control mb-2" onkeypress="return checkNumber(event)" placeholder="Número" autocomplete="off">
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<input type="text" id="complement" name="complement" class="form-control mb-2" placeholder="Complemento" autocomplete="off">
						</div>

						<div class="col-md-4">
							<input type="text" id="zipcode" name="zipcode" class="form-control mb-2 zipcode" placeholder="CEP" autocomplete="off">
						</div>

						<div class="col-md-4">
							<input type="text" id="neighborhood" name="neighborhood" class="form-control mb-2" placeholder="Bairro" autocomplete="off">
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<input type="text" id="city" name="city" class="form-control mb-2" placeholder="Cidade" autocomplete="off">
						</div>

						<div class="col-md-6">
							<input type="text" id="state" name="state" class="form-control mb-2" maxlength="2" placeholder="Estado [ex: SP]" autocomplete="off">
						</div>
					</div>

					<hr class="mb-4">
					
					<div class="row">
						<div class="col-md-4">
							<input type="text" id="phone1" name="phone1" class="form-control mb-2 phone" placeholder="Telefone 1" autocomplete="off">
						</div>

						<div class="col-md-4">
							<input type="text" id="phone2" name="phone2" class="form-control mb-2 phone" placeholder="Telefone 2" autocomplete="off">
						</div>

						<div class="col-md-4">
							<input type="text" id="phone3" name="phone3" class="form-control mb-2 phone" placeholder="Telefone 3" autocomplete="off">
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-4">
							<input type="text" id="phone4" name="phone4" class="form-control mb-2 phone" placeholder="Telefone 4" autocomplete="off">
						</div>

						<div class="col-md-4">
							<input type="text" id="phone5" name="phone5" class="form-control mb-2 phone" placeholder="Telefone 5" autocomplete="off">
						</div>

						<div class="col-md-4">
							<input type="text" id="phone6" name="phone6" class="form-control mb-2 phone" placeholder="Telefone 6" autocomplete="off">
						</div>
					</div>

					<hr class="mb-4">

					<input type="hidden" name="function" value="contacts">
					<button class="btn btn-primary btn-lg btn-block" type="submit">Cadastrar</button>
				</form>

			</div>
		</div>

		<footer class="my-5 pt-5 text-muted text-center text-small">
			<p class="mb-1">&copy; 2020 - Eduardo Barros Villa</p>
		</footer>
	</div>

	<script src="assets/js/jquery/jquery.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="assets/js/jquery/jquery.mask.min.js"></script>
    <script src="assets/js/jquery/jquery.validate.min.js"></script>
	<script src="assets/js/custom.js"></script>

</body>
</html>