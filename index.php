<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<?php include("parts/head.php"); ?>
	<body>
		<div class="title">
			<span>
				<a href="index.php">chat</a>\<?php
					include("parts/user.php");
				?>
			</span>
		</div>
		<?php include("parts/menu.php"); ?>
		<div class="container">
			<div class="content">

				<?php
					if ($_SESSION ?? NULL) {
						echo '
							<a class="button" href="private.php">Chat privado</a>
							<br><br>
							<a class="button" href="public.php">Chat público</a>
						';
					} else {
						echo '
							<a class="button" href="signin.php">Criar nova conta</a>
							<br><br>
							<a class="button" href="login.php">Entrar numa conta</a>
							<br><br>
							<a href="public.php">Entrar como visitante</a>
						';
					}
				?>
				<br><br>
				<span id="outAlert"></span>
			</div>
		</div>
		<?php include("parts/footer.php"); ?>
	</body>
	<script src="js/script.js"></script>
</html>