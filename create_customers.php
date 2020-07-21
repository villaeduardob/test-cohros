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
	<link href="assets/css/login.css" rel="stylesheet">
</head>
<body class="text-center">

	<form class="form-signin" id="formCreateCustomers" method="post">
		<img class="mb-4" src="assets/images/logo.png" alt="" width="72" height="72">

		<h1 class="h3 mb-3 font-weight-normal">Cadastro de Cliente</h1>

		<div id="message" class="alert" role="alert" style="display:none;"></div>
		
		<input type="name" id="name" name="name" class="form-control mb-2" placeholder="Nome" autocomplete="off" autofocus>
		
		<input type="email" id="email" name="email" class="form-control mb-2" placeholder="E-mail" autocomplete="off">
		
		<input type="password" id="password" name="password" class="form-control mb-2" placeholder="Senha">
		
		<input type="hidden" name="function" value="customers">
		<button type="submit" class="btn btn-lg btn-primary btn-block" id="btnForm">Cadastrar</button>

		<br>

		<a href="/cohros">Voltar</a>

		<p class="mt-5 mb-3 text-muted">&copy; 2020 - Eduardo Barros Villa</p>
	</form>

	<script src="assets/js/jquery/jquery.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="assets/js/jquery/jquery.validate.min.js"></script>
    <script src="assets/js/customers.js"></script>

</body>
</html>