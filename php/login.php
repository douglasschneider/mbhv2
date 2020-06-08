<?php
include('includes/header.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
	if ($_POST['email'] == "admin@admin.com" && $_POST['senha'] == "admin") {
		$_SESSION['usuarioLogado'] = [
			"email" => $_POST['email'],
		];
		
		if (isset($_SESSION['url_redirect'])) {
			$urlRedirect = $_SESSION['url_redirect'];
			unset($_SESSION['url_redirect']);
			//header('Location: ' . $_SESSION['url_redirect']);
		} else {
			header('Location: index.php');
		}
	} else {
		header('Location: login.php');
	}
}
?>
<br>
<br>
<center>
<form class="form-signin" method="post">
	<h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
	<label for="inputEmail" class="sr-only">Email address</label>
	<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus style="width: 600px;"> 
	<br>
	<label for="inputPassword" class="sr-only">Password</label>
	<input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required style="width: 600px;">
	<div class="checkbox mb-3">
		<label>
			<input type="checkbox" value="remember-me"> Lembre-me
		</label>
	</div>
	<button class="btn btn-primary" type="submit">Logar</button>
</form>
<center>
<?php
include('includes/footer.php');
?>
