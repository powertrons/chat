<?php 
	session_start();
    if ($_SESSION == NULL) {
        echo "<script> window.location.href = 'login.php'; </script>";
		die();
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<?php include("parts/head.php"); ?>
	<body>
		<div class="title">
			<span><a href="index.php">chat</a>\private\<?php
					include("parts/user.php");
				?>
			</span>
		</div>
		<?php include("parts/menu.php"); ?>
		<div class="container">
			<div class="content">
				<a href="php/messages_private.php" target="_blank">Ver toda conversa</a>
				<br><br>
				<div id="outMessages"></div>
				<br><br>
				<form id="chat">
					<label for="inMessage">Mensagem:</label>
					<br>
					<input type="text" id="inMessage" autocomplete="off" maxlength="110" spellcheck="true">
					<input type="button" value="Enviar" id="btSend">
					<br>
					<span id="letters">0/110</span>
					<br><br>
					<span id="outAlert"></span>
				</form>
			</div>
		</div>
		<?php include("parts/footer.php"); ?>
	</body>
    <script src="js/chat_private.js"></script>
	<script src="js/script.js"></script>
</html>