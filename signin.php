<?php 
	session_start();
	if ($_SESSION ?? NULL) {
        echo "<script> window.location.href = 'index.php'; </script>";
		die();
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<?php include("parts/head.php"); ?>
	<body>
		<div class="title">
			<span><a href="index.php">chat</a>\signin\<?php
					include("parts/user.php");
				?>
			</span>
		</div>
		<?php include("parts/menu.php"); ?>
		<div class="container">
			<div class="content">
				<h1>Cadastrar</h1>
				<br><br>
				<form id="cadastrar">
					<label for="inName">Nome real:</label>
					<br>
					<input type="text" id="inName" autocomplete="name" placeholder="Nome Sobrenome" title="Digite seu nome real">
					<br><br>
					<label for="inUsername">Nome de usuário:</label>
					<br>
					<input type="text" id="inUsername" autocomplete="username" placeholder="@" title="Digite seu nome de usuário">
					<br><br>
					<label for="inEmail">Email:</label>
					<br>
					<input type="email" id="inEmail" autocomplete="email" placeholder="exemplo@dominio.com" title="Digite seu email">
					<br><br>
					<label for="inPassword">Senha:</label>
					<br>
					<input type="password" id="inPassword" autocomplete="off" placeholder="****" title="Digite sua senha">
					<br>
					<input type="checkbox" id="cbPassword">
					<label for="cbPassword">Ver senha</label>
					<br><br>
					<label for="inCpassword">Confirme a senha:</label>
					<br>
					<input type="password" id="inCpassword" autocomplete="off" placeholder="****" title="Digire novamente sua senha">
					<br>
					<input type="checkbox" id="cbCpassword">
					<label for="cbCpassword">Ver senha</label>
                    <br><br><br>
					<input type="button" value="Cadastrar" id="btSignin">
					<br><br>
					<span id="outAlert"></span>
				</form>
			</div>
		</div>
		<?php include("parts/footer.php"); ?>
	</body>
    <script src="js/signin.js"></script>
	<script src="js/script.js"></script>
	<script>

		const cbPassword = document.getElementById("cbPassword");
		const cbCpassword = document.getElementById("cbCpassword");

		function showPassword(e) {
			if (e.target.checked == true) {
				inPassword.type = "text";
			} else if (e.target.checked == false) {
				inPassword.type = "password";
			}
		}

		function showCpassword(e) {
			if (e.target.checked == true) {
				inCpassword.type = "text";
			} else if (e.target.checked == false) {
				inCpassword.type = "password";
			}
		}

		cbPassword.addEventListener("change", showPassword);
		cbCpassword.addEventListener("change", showCpassword);
		
	</script>
</html>