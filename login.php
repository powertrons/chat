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
			<span><a href="index.php">chat</a>\login\<?php
					include("parts/user.php");
				?>
			</span>
		</div>
		<?php include("parts/menu.php"); ?>
		<div class="container">
			<div class="content">
				<h1>Entrar</h1>
				<br><br>
				<form id="entrar">
					<label for="inEmail">Email:</label>
					<br>
					<input name="email" type="email" id="inEmail" autocomplete="email" placeholder="exemplo@hotmail.com" title="Digite seu email">
					<br><br>
					<label for="inPassword">Senha:</label>
					<br>
					<input name="password" type="password" id="inPassword" autocomplete="off" placeholder="****" title="Digite sua senha">
					<br>
					<input type="checkbox" id="cbPassword">
					<label for="cbPassword">Ver senha</label>
					<br><br><br>
					<input type="button" value="Entrar" id="btLogin">
					<br><br>
					<span id="outAlert"></span>
				</form>
			</div>
		</div>
		<?php include("parts/footer.php"); ?>
	</body>
    <script src="js/login.js"></script>
	<script src="js/script.js"></script>
</html>